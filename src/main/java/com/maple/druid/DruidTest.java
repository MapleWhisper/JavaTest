package com.maple.druid;

import com.alibaba.druid.sql.SQLUtils;
import com.alibaba.druid.sql.ast.SQLStatement;
import com.alibaba.druid.sql.dialect.mysql.visitor.MySqlSchemaStatVisitor;
import com.alibaba.druid.sql.dialect.oracle.visitor.OracleSchemaStatVisitor;
import com.alibaba.druid.sql.visitor.ParameterizedOutputVisitorUtils;
import com.alibaba.druid.util.JdbcConstants;
import com.alibaba.druid.wall.WallCheckResult;
import com.alibaba.druid.wall.spi.OracleWallProvider;
import com.alibaba.fastjson.JSON;

/**
 * Created by 82760 on 2016/9/29.
 */
public class DruidTest {
    public static void main(String args[]){
        String sql = "select * from u where id = 1 or name = '123' or 1 = 2 +1 or '2'='abc' or fun(1,2)=3 ";

        //MySqlWallProvider provider = new MySqlWallProvider();
        //provider.checkValid(sql);
        OracleWallProvider provider = new OracleWallProvider();
        provider.checkValid(sql);
        WallCheckResult result = provider.check(sql);

        System.out.println(JSON.toJSONString(result));


        SQLStatement stmt = SQLUtils.parseStatements(sql,JdbcConstants.ORACLE).get(0);
        OracleSchemaStatVisitor visitor = new OracleSchemaStatVisitor();
        stmt.accept(visitor);

        //获取表名称
        System.out.println("Tables : " + visitor.getCurrentTable());
        //获取操作方法名称,依赖于表名称
        System.out.println("Manipulation : " + visitor.getTables());
        //获取字段名称
        System.out.println("fields : " + visitor.getColumns());



        String sqlParamteized = ParameterizedOutputVisitorUtils.parameterize(sql, JdbcConstants.ORACLE);
        System.out.print(sqlParamteized);


    }
}
