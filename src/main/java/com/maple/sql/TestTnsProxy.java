package com.maple.sql;

import java.sql.*;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;
import java.util.concurrent.TimeUnit;

/**
 * Created by 82760 on 2017/9/19.
 */
public class TestTnsProxy {

    private static Connection con = null;// 创建一个数据库连接
    private static PreparedStatement pstmt = null;// 创建预编译语句对象，一般都是用这个而不用Statement
    private static ResultSet result = null;// 创建一个结果集对象


    private static void testSql(String sql) {
        try {
            Connection con = OracleDB.getConnection("HR", "hr");
            Statement stmt = con.createStatement();
            ResultSet rs = stmt.executeQuery(sql);
            while (rs.next()) {

                String s = rs.getString(1);
//                        System.out.println(s);
            }

        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }

    private  void testDB(String username, String password, String tablePattern) {

        //PreparedStatement pstmt2 = null;

        Connection con = null;// 创建一个数据库连接
        PreparedStatement pstmt = null;// 创建预编译语句对象，一般都是用这个而不用Statement
        ResultSet result = null;// 创建一个结果集对象
        String selectAllTablesSql = "SELECT *  FROM ALL_TABLES WHERE OWNER=? and Table_Name like ? ";

        String selectTableSql = "Select * from ";

        con = OracleDB.getConnection(username, password);
        try {
            assert con != null;
            pstmt = con.prepareStatement(selectAllTablesSql);// 实例化预编译语句
            pstmt.setString(1, username);
            pstmt.setString(2,tablePattern);


            //pstmt2 = con.prepareStatement();

            result = pstmt.executeQuery();
            while (result.next()) {
                long start = System.currentTimeMillis();
                String tableName = result.getString(2);
                System.out.println("tableName:" + tableName);
                try {
                    Statement stmt = con.createStatement();
                    ResultSet rs = stmt.executeQuery(selectTableSql + tableName);
                    while (rs.next()) {

                        String s = rs.getString(1);
//                        System.out.println(s);
                    }

                } catch (SQLException e) {
                    System.out.println(e.getMessage());
                }
                long end = System.currentTimeMillis();
//                System.out.println("time spend : "+(end-start)+"ms");


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

    public static void setProxy(String proxyHost , String proxyPort){
        System.setProperty("proxySet", "true");
        System.setProperty("socksProxyHost", proxyHost);
        System.setProperty("socksProxyPort", proxyPort);
    }


    public void concurrentTestDB(final String username, final String password, final String tablePattern,int threadNum){



        long start = System.currentTimeMillis();

        ExecutorService fixedThreadPool = Executors.newFixedThreadPool(threadNum+1);
        for (int i = 0; i <threadNum; i++) {
            fixedThreadPool.execute(() -> {
                long start2 = System.currentTimeMillis();
                TestTnsProxy test = new TestTnsProxy();
                test.testDB(username,password,tablePattern);
                long end2 = System.currentTimeMillis();
                System.out.println("thread time spend : "+(end2- start2)+"ms");
            });

        }
        fixedThreadPool.shutdown();

        try {
            while (!fixedThreadPool.awaitTermination(100, TimeUnit.MILLISECONDS)){

            }
        } catch (InterruptedException e) {
            e.printStackTrace();
        }


        //testDB("SCOTT","scott","%");
        long end = System.currentTimeMillis();
        System.out.println("All thread time spend : "+(end-start)+"ms");
    }


    public static void main(String args[])  {

        TestTnsProxy test = new TestTnsProxy();
//        setProxy("127.0.0.1","8080");


//        testSql("select * from jobs");
//        testSql("Select * from TEST72");

//        test.testDB("HR", "hr", "%");
//        test.concurrentTestDB("SCOTT","scott","%");
        test.concurrentTestDB("HR","hr","M%",1);
    }
}
