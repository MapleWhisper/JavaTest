/**
 * meituan.com Inc.
 * Copyright (c) 2010-2019 All Rights Reserved.
 */
package com.maple;

import com.alibaba.fastjson.JSON;

/**
 * <p>
 *
 * </p>
 * @author yuguanglu
 * @version :TestInter.java v1.0 2019-09-04 12:38 yuguanglu Exp $
 */
public interface TestInter {
    default String toJsonString(){
        return JSON.toJSONString(this);
    }
}
