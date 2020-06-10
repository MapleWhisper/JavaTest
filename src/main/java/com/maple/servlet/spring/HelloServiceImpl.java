/**
 * meituan.com Inc.
 * Copyright (c) 2010-2019 All Rights Reserved.
 */
package com.maple.servlet.spring;

import com.maple.servlet.HelloServlet;
import org.springframework.stereotype.Service;

/**
 * <p>
 *
 * </p>
 * @author yuguanglu
 * @version :HelloService.java v1.0 2019-09-12 16:41 yuguanglu Exp $
 */
@Service
public class HelloServiceImpl implements HelloService {

    public String getName(){
        return "hello";
    }
}
