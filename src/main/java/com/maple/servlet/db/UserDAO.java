package com.maple.servlet.db;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

/**
 * Created by 82760 on 2016/10/31.
 */
public class UserDAO {
    volatile int n =0;

    public List<User> findAll(String name ){
        Connection conn = DB.getConnection();
        List<User> list = new ArrayList<User>();
        Statement stmt = null;
        try {
            stmt = conn.createStatement();
            String sql = "SELECT * from test ";
            sql = sql + "where name = '"+name +"' " ;
            System.out.println(n++);
            ResultSet rs  = stmt.executeQuery(sql);
            while (rs.next()) {
                User user = new User();
                user.setId(rs.getInt(1));
                user.setName(rs.getString(2));
                list.add(user);

            }
        } catch (SQLException e) {
            e.printStackTrace();
        }finally {
            if(conn!=null){
                try {
                    conn.close();
                } catch (SQLException e) {
                    e.printStackTrace();
                }
            }
        }
        return list;

    }
}
