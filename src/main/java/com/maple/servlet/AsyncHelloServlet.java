package com.maple.servlet;

import com.alibaba.fastjson.JSON;
import org.springframework.context.ApplicationContext;
import org.springframework.context.support.ClassPathXmlApplicationContext;

import javax.servlet.AsyncContext;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.util.List;
import java.util.concurrent.ThreadPoolExecutor;

/**
 * Servlet implementation class ServletDemo
 */
@WebServlet(
        urlPatterns = {"/AsyncHelloServlet"},asyncSupported = true,
        loadOnStartup = 2
)
public class AsyncHelloServlet extends HttpServlet {
    private static final long serialVersionUID = 1L;

    volatile  int i=0;
//    private UserDAO userDAO = new UserDAO();

    public AsyncHelloServlet() {
        super();

    }

    @Override
    public void init() throws ServletException {
        super.init();
        System.out.println("ok AsyncHelloServlet");
//        ApplicationContext context = new ClassPathXmlApplicationContext("spring.xml");
    }

    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
//        doPost(request, response);
        response.getWriter().println("ok");
    }

    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        request.setCharacterEncoding("UTF-8");
        response.setContentType("application/json;charset=utf-8");


        AsyncContext asyncContext = request.startAsync();
        asyncContext.addListener(new AppAsyncListener());
        asyncContext.setTimeout(2000);
//        System.out.println(i++);
        //String name = request.getParameter("name");
        ThreadPoolExecutor executor = (ThreadPoolExecutor) request
                .getServletContext().getAttribute("executor");
        executor.execute(new AsyncRequestProcessor(asyncContext, 10000));
    }

}