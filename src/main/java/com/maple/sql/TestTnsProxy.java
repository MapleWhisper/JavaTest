package com.maple.sql;

import java.sql.*;

/**
 * Created by 82760 on 2017/9/19.
 */
public class TestTnsProxy {

    private static Connection con = null;// 创建一个数据库连接
    private static PreparedStatement pstmt = null;// 创建预编译语句对象，一般都是用这个而不用Statement
    private static ResultSet result = null;// 创建一个结果集对象


    private static void testSql(String sql) {
        con = OracleDB.getConnection(null,null);
        try {
            assert con != null;
            pstmt = con.prepareStatement(sql);// 实例化预编译语句
            result = pstmt.executeQuery();
            while(result.next()){
                result.getString(1);
            }


        } catch (SQLException e) {
            e.printStackTrace();
        }finally {
            try {
                if(con!=null){
                    con.close();
                }
            } catch (SQLException e) {
                e.printStackTrace();
            }
        }

    }

    private static void testDB(String username ,String password) {

        //PreparedStatement pstmt2 = null;

        String selectAllTablesSql = "SELECT *  FROM ALL_TABLES WHERE OWNER=? ";

        String selectTableSql = "Select * from ";

        con = OracleDB.getConnection(username,password);
        try {
            assert con != null;
            pstmt = con.prepareStatement(selectAllTablesSql);// 实例化预编译语句
            pstmt.setString(1, username);


            //pstmt2 = con.prepareStatement();

            result = pstmt.executeQuery();
            while (result.next()) {
                String tableName = result.getString(2);
                System.out.println("tableName:"+tableName);
                try{
                    Statement stmt = con.createStatement();
                    ResultSet rs = stmt.executeQuery(selectTableSql+tableName);
                    while(rs.next()){
                        rs.getString(1);
                    }

                }catch (SQLException e){
                    System.out.println(e.getMessage());
                }


            }
        } catch (SQLException e) {
            e.printStackTrace();
        } finally {
            try {
                if (con != null) {
                    con.close();
                }
            } catch (SQLException e) {
                e.printStackTrace();
            }
        }
    }


    public static void main(String args[]){


        testSql("select * from LDATA12");
//        System.out.println("ok");
//        testSql("Select * from NUMBER3");
//        testDB("SCOTT","scott");
//        testDB("Hr","hr");
        
    }
}
