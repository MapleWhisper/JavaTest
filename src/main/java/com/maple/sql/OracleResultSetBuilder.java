package com.maple.sql;

import org.relaxng.datatype.Datatype;

import javax.xml.crypto.Data;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.Random;

public class OracleResultSetBuilder {

    public static final String[] alldatatype = {"char", "nchar", "varchar2", "nvarchar2", "date", "timestamp", "long", "blob", "clob", "nclob", "bfile", "number", "int", "float"};

    public static final String[] testStrings = {"HelloWorld", "你好,世界", "ABCDEFGHIJ", "1234567890", "测试数据", "!@#$%^&*()", "OracleJava"};
    public static int[] testStringsByteLength = new int[100];

    static {
        //计算测试字符串的长度
        for (int i = 0; i < testStrings.length; i++) {
            testStringsByteLength[i] = testStrings[i].getBytes().length;
        }
    }

    public static SimpleDateFormat df = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");


    public static final int MaxColumnCount = 50;
    public static final int MaxRowCount = 100;

    public static final int NullProbability = 20;   //20%的概率生成空的字段

    public static Random random = new Random();

    public String username;
    public String password;
    public Connection conn;
    public int tableCnt;            //创建多少个表
    public String tablePrefix;      //创建表明的前缀
    public int tablePrefixStartIndex;    //创建表名前缀开始的下标，例如Test1  Test10
    public String tableName;        //表名
    public List<ColumnNode> columnNodeList = null;
    boolean insertIntoDataBase = true;
    int cellCnt = 0;


    public static class ColumnNode {
        public DataType dataType;
        public int precision;
        public int scale;

    }

    public OracleResultSetBuilder(String username, String password, int tableCnt) {
        this.username = username;
        this.password = password;
        this.tableCnt = tableCnt;
    }

    public OracleResultSetBuilder(int tableCnt, String tablePrefix, int tablePrefixStartIndex ) {
        this.tableCnt = tableCnt;
        this.tablePrefix = tablePrefix;
        this.tablePrefixStartIndex = tablePrefixStartIndex;
    }

    public OracleResultSetBuilder() {
    }

    public static void main(String[] args) {

        OracleResultSetBuilder builder = new OracleResultSetBuilder(9, "Test", 31);
        //builder.insertIntoDataBase = true;
        builder.startInsert();


    }


    public String createTableSql(int index) {
        System.out.println("开始构造生成表SQL语句");
        StringBuilder sb = new StringBuilder();
        tableName = tablePrefix + (tablePrefixStartIndex + index);
        sb.append("CREATE TABLE ").append(tableName).append(" (\n");

        for (int i = 0; i < columnNodeList.size(); i++) {
            ColumnNode node = columnNodeList.get(i);
            String fieldName = getFieldName(i, node);
            String dataTypeName = getDataTypeName(node);
            sb.append("\t").append(fieldName);
            sb.append("\t").append(dataTypeName);
            if (i != columnNodeList.size() - 1) {
                sb.append(",");
            }
            sb.append("\n");
        }

        sb.append(" )");

        return sb.toString();
    }

    private String getDataTypeName(ColumnNode node) {
        String dataTypeName = node.dataType.name;

        if (DataType.isChar(node.dataType)) {
            dataTypeName += "(";
            dataTypeName += node.precision;
            dataTypeName += ")";
        }
        if (node.dataType == DataType.dataTypeNumber) {
            dataTypeName += "(";
            dataTypeName += node.precision;
            dataTypeName += ",";
            dataTypeName += node.scale;
            dataTypeName += ")";
        }
        return dataTypeName;
    }

    private String getFieldName(int index, ColumnNode node) {
        String fieldName = node.dataType.name + "_";
        if (node.precision > 0) {
            fieldName += node.precision;
            fieldName += "_";
        }
        fieldName += (index + 1);
        return fieldName;
    }

    public boolean executeSQL(String sql) {
        conn = OracleDB.getConnection(username, password);
        PreparedStatement pstmt;
        try {
            assert conn != null;
            pstmt = conn.prepareStatement(sql);// 实例化预编译语句
            pstmt.execute();
            return true;


        } catch (SQLException e) {

            e.printStackTrace();
            return false;
        } finally {
            try {
                if (conn != null) {
                    conn.close();
                }
            } catch (SQLException e) {
                e.printStackTrace();
            }
        }


    }


    public void startInsert() {
        System.out.println("程序初始化...");


        for (int i = 0; i < tableCnt; i++) {
            columnNodeList = createColumnNodeList();
            String createTableSql = createTableSql(i);
            System.out.println(createTableSql);
            if(insertIntoDataBase){
                boolean execSuccess = executeSQL(createTableSql);
                if (!execSuccess) {
                    // 执行创建表SQL命令出错，表名可能已经存在，跳过这个表，继续创建
                    continue;
                }
            }

            //向生成的表中插入数据
            insertRawIntoTable();


        }


    }

    private void insertRawIntoTable() {

        String insertSqlPrefix = "INSERT INTO " + tableName + " VALUES(";
        int rowCnt = random.nextInt(MaxRowCount);

        for (int i = 0; i < rowCnt; i++) {
            //生成行
            StringBuilder sb = new StringBuilder();
            sb.append(insertSqlPrefix);

            for (int j = 0; j < columnNodeList.size(); j++) {
                //生成列
                sb.append(createCellData(columnNodeList.get(j), cellCnt));
                if (j != columnNodeList.size() - 1) {
                    sb.append(" , ");
                }
            }
            sb.append(")\n");
            System.out.println(sb.toString());
            if(insertIntoDataBase){
                executeSQL(sb.toString());
            }
        }


    }

    private String createCellData(ColumnNode columnNode, int cellCnt) {
        DataType type = columnNode.dataType;
        StringBuilder sb = new StringBuilder();
        char c = (char) ('A' + (cellCnt % 26));

        if (random.nextInt(100) < NullProbability) {
            //一定概率生成空
            return "null";
        } else if (DataType.isChar(type)) {
            return getRandomString(columnNode.precision,c);
        } else if(DataType.isLob(type)){
            if(type==DataType.dataTypeBlob){
                sb = new StringBuilder();
                sb.append("to_blob('");
                for(int i=0;i<random.nextInt(4000);i++)
                {
                    sb.append(random.nextInt(2));
                }
                sb.append("')");
                return sb.toString();
            }else if(type==DataType.dataTypeBfile){
                return "BFILENAME('tmpdir', '~/tmp.txt')";
            }else{
                //CLOB 和 NCLOB 随机创建6000字节大小的数据
                return getRandomString(random.nextInt(4000),c);
            }
        } else if(DataType.isNumber(type)){
            if(type==DataType.dataTypeNumber || type==DataType.dataTypeFloat){
                int val = random.nextInt((int) Math.pow(10,columnNode.precision-columnNode.scale));

                int decimalVal = random.nextInt((int) Math.pow(10,columnNode.scale));
                return ""+val+"."+decimalVal;
            }else if(type==DataType.dataTypeInt){
                return ""+random.nextInt(Integer.MAX_VALUE);
            }

        } else if(DataType.isDate(type)){

            String myDate = df.format(new Date()); //当前时间
            sb = new StringBuilder();

            if(type==DataType.dataTypeDate){
                sb.append("to_date('");
            }else{
                sb.append("to_timestamp('");
            }
            sb.append(myDate);
            sb.append("','yyyy-mm-dd hh24:mi:ss')");
            return sb.toString();
        }
        else{
            System.out.println("unknown datatype "+ type.name);
        }
        return "null";

    }

    private String getRandomString(int length,char PrefixChar){
        StringBuilder sb = new StringBuilder();

        sb.append("'");

        if (length > 8) {
            //如果字段长度大于8，那么在字段的前后添加“AAAA数据部分AAAA”的标记，这样在测试时能更快从TNS包中定位到数据的位置
            sb.append(PrefixChar).append(PrefixChar).append(PrefixChar).append(PrefixChar);


        }
        int leftBytes = length-8;
        while(true){

            int index = random.nextInt(testStrings.length);

            String s = testStrings[index];
            int sByteLength = testStringsByteLength[index];
            if(leftBytes-sByteLength<0){
                break;
            }else{
                sb.append(s);
                leftBytes-=sByteLength;
            }

        }

        if (length > 8) {

            sb.append(PrefixChar).append(PrefixChar).append(PrefixChar).append(PrefixChar);

        }
        sb.append("'");
        cellCnt++;
        return sb.toString();
    }

    /**
     * 构造列的信息，列的类型和长度
     */
    private List<ColumnNode> createColumnNodeList() {
        System.out.println("开始构造列信息...");
        int columnCnt = random.nextInt(MaxColumnCount);
        boolean haveLongColumn = false;
        List<ColumnNode> columnNodes = new ArrayList<ColumnNode>();
        for (int i = 0; i < columnCnt; i++) {
            ColumnNode node = new ColumnNode();

            DataType type = DataType.getOneDataType();

            if (type == DataType.dataTypeLong) {
                //表中只能存在一个LONG类型的字段
                if (haveLongColumn) {
                    continue;
                } else {
                    haveLongColumn = true;
                }
            }

            node.precision = getPrecision(type);
            node.dataType = type;
            node.scale = getScale(type);
            if(node.scale!=0){
                node.precision+=node.scale;
            }
            columnNodes.add(node);

        }
        return columnNodes;

    }

    private int getScale(DataType type) {
        if (type == DataType.dataTypeNumber) {
            return random.nextInt(10)+1;
        }
        return 0;
    }

    private int getPrecision(DataType type) {
        if (DataType.isChar(type)) {
            return random.nextInt(1000)+10;
        }
        if (type == DataType.dataTypeNumber) {
            return random.nextInt(15)+1;
        }
        return 0;
    }


}
