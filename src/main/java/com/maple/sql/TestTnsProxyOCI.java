package com.maple.sql;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.Properties;

public class TestTnsProxyOCI {
    public static void main(String[] args) throws SQLException {

        Connection conn1 = null;
        Connection conn2 = null;
        Connection conn3 = null;

        try {
            // registers Oracle JDBC driver - though this is no longer required
            // since JDBC 4.0, but added here for backward compatibility
            Class.forName("oracle.jdbc.OracleDriver");

            // METHOD #3
            String dbURL3 = "jdbc:oracle:oci:@192.168.1.160:1521/orcl";
            Properties properties = new Properties();
            properties.put("user", "HR");
            properties.put("password", "hr");
            conn3 = DriverManager.getConnection(dbURL3, properties);

            if (conn3 != null) {
                System.out.println("Connected with connection #3");
            }
        } catch (ClassNotFoundException | SQLException ex) {
            ex.printStackTrace();
        } finally {
            try {

                if (conn3 != null && !conn3.isClosed()) {
                    conn3.close();
                }
            } catch (SQLException ex) {
                ex.printStackTrace();
            }
        }
    }
}
