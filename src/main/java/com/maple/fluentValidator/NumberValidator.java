/**
 * meituan.com Inc.
 * Copyright (c) 2010-2019 All Rights Reserved.
 */
package com.maple.fluentValidator;

import com.baidu.unbiz.fluentvalidator.ValidatorContext;
import com.baidu.unbiz.fluentvalidator.ValidatorHandler;

/**
 * <p>
 *
 * </p>
 * @author admin
 * @version :NumberValidator.java v1.0 2019-07-23 14:32 admin Exp $
 */
public class NumberValidator extends ValidatorHandler<Integer> {

    @Override
    public boolean validate(ValidatorContext context, Integer value) {
        if(value<=0){
            context.addErrorMsg("number error");
            return false;
        }
        return  true;

    }
}
