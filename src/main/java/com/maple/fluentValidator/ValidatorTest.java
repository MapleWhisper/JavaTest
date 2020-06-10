/**
 * meituan.com Inc.
 * Copyright (c) 2010-2019 All Rights Reserved.
 */
package com.maple.fluentValidator;

import com.alibaba.fastjson.JSON;
import com.baidu.unbiz.fluentvalidator.FluentValidator;
import com.baidu.unbiz.fluentvalidator.Result;

import static com.baidu.unbiz.fluentvalidator.ResultCollectors.toSimple;

/**
 * <p>
 *
 * </p>
 * @author admin
 * @version :ValidatorTest.java v1.0 2019-07-23 14:32 admin Exp $
 */
public class ValidatorTest {

    public static void main(String[] args) {
        Integer i = -1;
        Result ret = FluentValidator.checkAll().on(i,new NumberValidator()).doValidate().result(toSimple());

        if(!ret.isSuccess()){
            System.out.println(JSON.toJSONString(ret,true));
        }

    }

}
