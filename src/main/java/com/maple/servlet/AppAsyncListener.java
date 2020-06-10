/**
 * meituan.com Inc.
 * Copyright (c) 2010-2019 All Rights Reserved.
 */
package com.maple.servlet;

import javax.servlet.AsyncEvent;
import javax.servlet.AsyncListener;
import javax.servlet.ServletResponse;
import java.io.IOException;
import java.io.PrintWriter;

/**
 * <p>
 *
 * </p>
 * @author yuguanglu
 * @version :AppAsyncListener.java v1.0 2019-09-11 11:38 yuguanglu Exp $
 */
public class AppAsyncListener implements AsyncListener {
    @Override
    public void onComplete(AsyncEvent event) throws IOException {
        System.out.println("complete");
    }

    @Override
    public void onTimeout(AsyncEvent event) throws IOException {
        ServletResponse response = event.getAsyncContext().getResponse();
        PrintWriter out = response.getWriter();
        out.write("TimeOut Error in Processing");
    }

    @Override
    public void onError(AsyncEvent event) throws IOException {
        System.out.println("error");
    }

    @Override
    public void onStartAsync(AsyncEvent event) throws IOException {
        ServletResponse response = event.getAsyncContext().getResponse();
        PrintWriter out = response.getWriter();
        out.write("TimeOut Error in Processing");
    }
}
