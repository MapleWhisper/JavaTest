package com.maple.sql;

import com.alibaba.druid.util.StringUtils;

import java.io.IOException;
import java.io.InputStream;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.Properties;

public class OracleDB {


    private static  String url ;
    private static  String driverClassName;
    public static   String username;
    private static  String password;

    private OracleDB(){

    }

    static {
        try {
            Properties properties = new Properties();
            InputStream is = OracleDB.class.getClassLoader().getResourceAsStream("oracleconfig.properties");
            properties.load(is);
            driverClassName = properties.getProperty("driverClassName");
            url = properties.getProperty("url");
            username = properties.getProperty("username");
            password = properties.getProperty("password");
            Class.forName(driverClassName);// 动态加载mysql驱动
            System.out.println("成功加载Oracle驱动程序");
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public static Connection getConnection(String uname,String pwd) {
        Connection conn = null;
        String sql;
        // MySQL的JDBC URL编写方式：jdbc:mysql://主机名称：连接端口/数据库的名称?参数=值
        // 避免中文乱码要指定useUnicode和characterEncoding
        // 执行数据库操作之前要在数据库管理系统上创建一个数据库，名字自己定，
        // 下面语句之前就要先创建javademo数据库

        try {
            if(!StringUtils.isEmpty(uname) && !StringUtils.isEmpty(pwd)){
                conn = DriverManager.getConnection(url,uname,pwd);
            }else{
                conn = DriverManager.getConnection(url,username,password);
            }

            return conn;
        } catch (SQLException e) {
            System.out.println("数据库操作错误");
            e.printStackTrace();
        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }


}
