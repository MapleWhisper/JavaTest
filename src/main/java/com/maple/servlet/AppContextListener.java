/**
 * meituan.com Inc.
 * Copyright (c) 2010-2019 All Rights Reserved.
 */
package com.maple.servlet;

import javax.servlet.ServletContextEvent;
import javax.servlet.ServletContextListener;
import javax.servlet.annotation.WebListener;
import java.util.concurrent.ArrayBlockingQueue;
import java.util.concurrent.ThreadPoolExecutor;
import java.util.concurrent.TimeUnit;

/**
 * <p>
 *
 * </p>
 * @author yuguanglu
 * @version :AppContextListener.java v1.0 2019-09-11 11:41 yuguanglu Exp $
 */
@WebListener
public class AppContextListener implements ServletContextListener {
    public void contextInitialized(ServletContextEvent servletContextEvent) {

        // create the thread pool
        ThreadPoolExecutor executor = new ThreadPoolExecutor(100, 200, 50000L,
                TimeUnit.MILLISECONDS, new ArrayBlockingQueue<Runnable>(1000));
        servletContextEvent.getServletContext().setAttribute("executor",
                executor);

    }

    public void contextDestroyed(ServletContextEvent servletContextEvent) {
        ThreadPoolExecutor executor = (ThreadPoolExecutor) servletContextEvent
                .getServletContext().getAttribute("executor");
        executor.shutdown();
    }
}
