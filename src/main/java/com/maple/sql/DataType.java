package com.maple.sql;

import org.relaxng.datatype.Datatype;

import javax.xml.crypto.Data;
import java.util.Random;

public enum DataType {

    dataTypeChar("char"),
    dataTypeNChar("nchar"),
    dataTypeVarchar2("varchar2"),
    dataTypeNVarchar2("nvarchar2"),
    dataTypeDate("date"),
    dataTypeTimestamp("timestamp"),
    dataTypeLong("long"),
    dataTypeBlob("blob"),
    dataTypeClob("clob"),
    dataTypeNclob("nclob"),
    dataTypeBfile("bfile"),
    dataTypeNumber("number"),
    dataTypeFloat("float"),
    dataTypeInt("int");


    public String name;
    public static Random random = new Random();

    private DataType(String name){
        this.name = name;
    }

    /**
     * 随机选取一个数据类型
     * @return
     */
    public static DataType getOneDataType(){

        DataType types[] = DataType.values();
        return types[random.nextInt(types.length)];

    }

    public static boolean isChar(DataType type){
        return (type ==dataTypeChar || type == DataType.dataTypeNChar
                || type == DataType.dataTypeVarchar2 || type==DataType.dataTypeNVarchar2);
    }

    public static boolean isLob(DataType type){
        return (type ==dataTypeClob || type == DataType.dataTypeBlob || type == DataType.dataTypeBfile
                || type == DataType.dataTypeNclob || type == DataType.dataTypeLong);
    }


    public static boolean isNumber(DataType type){
        return (type ==dataTypeNumber || type == DataType.dataTypeInt
                || type == DataType.dataTypeFloat );
    }

    public static boolean isDate(DataType type){
        return (type ==dataTypeDate || type == DataType.dataTypeTimestamp);
    }





}
