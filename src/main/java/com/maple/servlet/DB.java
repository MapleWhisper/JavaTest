package com.maple.servlet;

import com.alibaba.fastjson.JSON;

import java.io.IOException;
import java.io.InputStream;
import java.sql.*;
import java.util.Properties;

public class DB {


    private static  String url ;
    private static  String driverClassName;
    private static  String username;
    private static  String password;

    private DB(){

    }

    static {
        try {
            Properties properties = new Properties();
            InputStream is = DB.class.getClassLoader().getResourceAsStream("dbconfig.properties");
            properties.load(is);
            driverClassName = properties.getProperty("driverClassName");
            url = properties.getProperty("url");
            username = properties.getProperty("username");
            password = properties.getProperty("password");
            Class.forName(driverClassName);// 动态加载mysql驱动
            System.out.println("成功加载MySQL驱动程序");
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public static Connection getConnection() {
        Connection conn = null;
        String sql;
        // MySQL的JDBC URL编写方式：jdbc:mysql://主机名称：连接端口/数据库的名称?参数=值
        // 避免中文乱码要指定useUnicode和characterEncoding
        // 执行数据库操作之前要在数据库管理系统上创建一个数据库，名字自己定，
        // 下面语句之前就要先创建javademo数据库

        try {

            conn = DriverManager.getConnection(url,username,password);
            return conn;
        } catch (SQLException e) {
            System.out.println("MySQL操作错误");
            e.printStackTrace();
        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }


}
