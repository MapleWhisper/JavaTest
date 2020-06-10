package com.maple.thrift.open;

import com.alibaba.druid.sql.SQLUtils;
import com.alibaba.druid.sql.ast.SQLStatement;
import com.alibaba.druid.sql.dialect.oracle.visitor.OracleSchemaStatVisitor;
import com.alibaba.druid.sql.parser.SQLStatementParser;
import com.alibaba.druid.util.JdbcConstants;
import com.alibaba.druid.wall.WallCheckResult;
import com.alibaba.druid.wall.WallVisitor;
import com.alibaba.druid.wall.spi.OracleWallProvider;
import com.alibaba.druid.wall.spi.OracleWallVisitor;
import com.alibaba.fastjson.JSON;
import org.apache.thrift.TException;

/**
 * Created by 82760 on 2017/7/14.
 */
public class CalculatorHandler implements CalculatorService.Iface {

    private  static  OracleWallProvider provider = new OracleWallProvider();

    private  static OracleSchemaStatVisitor visitor = new OracleSchemaStatVisitor();
    private  static WallVisitor wallVisitor = new OracleWallVisitor(provider);

    @Override
    public int add(int num1, int num2) throws TException {
        return num1+num2;
    }

    @Override
    public int minus(int num1, int num2) throws TException {
        return num1-num2;
    }

    @Override
    public int multi(int num1, int num2) throws TException {
        return num1*num2;
    }

    @Override
    public int divi(int num1, int num2) throws TException {
        if(num2==0){
            throw  new  TException("分母不能为0");
        }
        return num1/num2;
    }

    @Override
    public String test(String input) throws TException {



        System.out.println("get client request..");
        WallCheckResult result = provider.check(input);
        String str = JSON.toJSONString(result);




//        //System.out.println());
        //

//        SQLStatement stmt = SQLUtils.parseStatements(input, JdbcConstants.ORACLE).get(0);
//        stmt.accept(visitor);
//        //获取操作方法名称,依赖于表名称
//        System.out.println("Manipulation : " + visitor.getTables());
//        //获取字段名称
//        System.out.println("fields : " + visitor.getColumns());


        return str;
    }

    @Override
    public void ping() throws TException {
        System.out.println("ping ok");
    }


}
