package com.maple.servlet;





import com.alibaba.fastjson.JSON;

import java.io.IOException;
import java.util.List;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class ServletDemo
 */
public class HelloServlet extends HttpServlet {
    private static final long serialVersionUID = 1L;

    private UserDAO userDAO = new UserDAO();

    public HelloServlet() {
        super();
    }

    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        doPost(request, response);
    }

    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        request.setCharacterEncoding("UTF-8");
        response.setContentType("text/html;charset=utf-8");

        String action = request.getParameter("action");
        if("login_input".equals(action)) {

            request.getRequestDispatcher("login.jsp").forward(request , response);
        } else if("login".equals(action)) {
            //String name = request.getParameter("name");
            //String password = request.getParameter("password");

            //System.out.println("name->" + name + ",password->" + password);
            String name = request.getParameter("name");
            if(name!=null){
                List<User> user = userDAO.findAll(name);

                response.getWriter().println(JSON.toJSONString(user));
            }

        }else{
            String name = request.getParameter("name");
            if(name!=null){
                List<User> user = userDAO.findAll(name);

                response.getWriter().println(JSON.toJSONString(user));
            }
        }


    }

}