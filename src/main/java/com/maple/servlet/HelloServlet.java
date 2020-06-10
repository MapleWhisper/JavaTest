package com.maple.servlet;

import com.alibaba.fastjson.JSON;
import com.maple.servlet.db.User;
import com.maple.servlet.db.UserDAO;
import com.maple.servlet.spring.HelloService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.ApplicationContext;
import org.springframework.context.support.ClassPathXmlApplicationContext;
import org.springframework.stereotype.Component;

import java.io.IOException;
import java.util.List;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class ServletDemo
 */
@WebServlet(
        urlPatterns = {"/helloServlet"},
        loadOnStartup = 1

)
@Component
public class HelloServlet extends HttpServlet {

    @Autowired
    public HelloService helloService;

    private static final long serialVersionUID = 1L;

    private UserDAO userDAO = new UserDAO();

    public HelloServlet() {
        super();
    }

    @Override
    public void init() throws ServletException {
        super.init();
        System.out.println("ok HelloServlet");
        ApplicationContext context = new ClassPathXmlApplicationContext("spring.xml");
    }

    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        doPost(request, response);
    }

    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        request.setCharacterEncoding("UTF-8");
        response.setContentType("application/json;charset=utf-8");

        String action = request.getParameter("action");
        //        try {
        //            Thread.sleep(100);
        //        } catch (InterruptedException e) {
        //            e.printStackTrace();
        //        }
        response.getWriter().println(helloService.getName());

//        if ("login_input".equals(action)) {
//
//            request.getRequestDispatcher("login.jsp").forward(request, response);
//        } else if ("login".equals(action)) {
//            //String name = request.getParameter("name");
//            //String password = request.getParameter("password");
//
//            //System.out.println("name->" + name + ",password->" + password);
//            String name = request.getParameter("name");
//            if (name != null) {
//                List<User> user = userDAO.findAll(name);
//
//                response.getWriter().println(JSON.toJSONString(user));
//            }
//
//        } else {
//            String name = request.getParameter("name");
//            if (name != null) {
//                List<User> user = userDAO.findAll(name);
//
//                response.getWriter().println(JSON.toJSONString(user));
//            }
//        }

    }

}