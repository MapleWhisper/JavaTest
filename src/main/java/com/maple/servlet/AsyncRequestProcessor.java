/**
 * meituan.com Inc.
 * Copyright (c) 2010-2019 All Rights Reserved.
 */
package com.maple.servlet;

import com.alibaba.fastjson.JSON;
import com.maple.servlet.db.User;
import com.maple.servlet.db.UserDAO;
import com.maple.servlet.spring.HelloService;
import org.springframework.stereotype.Component;

import javax.servlet.*;
import javax.servlet.annotation.WebListener;
import java.util.List;

/**
 * <p>
 *
 * </p>
 * @author yuguanglu
 * @version :AsyncRequestProcessor.java v1.0 2019-09-11 11:35 yuguanglu Exp $
 */
@WebListener
//@Component
public class AsyncRequestProcessor implements Runnable {

    private HelloService helloService;

    private AsyncContext asyncContext;

    private int secs;

    private UserDAO userDAO = new UserDAO();

    public AsyncRequestProcessor() {
    }

    public AsyncRequestProcessor(AsyncContext asyncCtx, int secs) {
        this.asyncContext = asyncCtx;
        this.secs = secs;
    }

    @Override
    public void run() {
//        System.out.println("Async Supported? "
//                           + asyncContext.getRequest().isAsyncSupported());
        ServletRequest request = asyncContext.getRequest();
        ServletResponse response = asyncContext.getResponse();


        try {
            response.getWriter().println(helloService.getName());
//            Thread.sleep(100);
//            String action = request.getParameter("action");
//            if("login".equals(action)) {
//                //String name = request.getParameter("name");
//                //String password = request.getParameter("password");
//
//                //System.out.println("name->" + name + ",password->" + password);
//                String name = request.getParameter("name");
//                if(name!=null){
//                    List<User> user = userDAO.findAll(name);
//
//                    response.getWriter().println(JSON.toJSONString(user));
//                }
//            }else{
//                String name = request.getParameter("name");
//                if(name!=null){
//                    List<User> user = userDAO.findAll(name);
//                    response.getWriter().println(JSON.toJSONString(user));
//
//                }
//            }

        } catch (Exception e) {
            e.printStackTrace();
        }
        //complete the processing
        asyncContext.complete();
    }



}
