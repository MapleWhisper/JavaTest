package com.maple.test;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.DatagramPacket;
import java.net.DatagramSocket;
import java.net.InetAddress;

import java.sql.*;

public class Main2 {

    public static void main(String[] args) {
        ResultSet rs = null;
        Statement stmt = null;
        Connection conn = null;
        try {
            Class.forName("oracle.jdbc.driver.OracleDriver");
            //new oracle.jdbc.driver.OracleDriver();
            conn = DriverManager.getConnection("jdbc:oracle:thin:@192.168.1.110:1521:orcl", "hr", "hr");
            stmt = conn.createStatement();
            rs = stmt.executeQuery("select * from jobs");
            while (rs.next()) {
                //System.out.println(rs.getString("deptno"));
                //System.out.println(rs.getInt("deptno"));
            }
        } catch (ClassNotFoundException | SQLException e) {
            e.printStackTrace();
        } finally {
            try {
                if (rs != null) {
                    rs.close();
                    rs = null;
                }
                if (stmt != null) {
                    stmt.close();
                    stmt = null;
                }
                if (conn != null) {
                    conn.close();
                    conn = null;
                }
            } catch (SQLException e) {
                e.printStackTrace();
            }
        }
    }

}

