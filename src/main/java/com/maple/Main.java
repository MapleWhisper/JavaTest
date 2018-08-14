package com.maple;

import com.maple.servlet.HelloServlet;
import net.sf.cglib.proxy.Enhancer;
import net.sf.cglib.proxy.MethodInterceptor;
import net.sf.cglib.proxy.MethodProxy;

import java.lang.reflect.InvocationHandler;
import java.lang.reflect.Method;
import java.lang.reflect.Proxy;
import java.util.HashMap;
import java.util.Scanner;

public class Main {

    public static Scanner scan = new Scanner(System.in);

    public interface IHello {
        void hello();
    }

    static class Hello implements IHello {
        @Override
        public void hello() {
            System.out.println("hello world");
        }
    }

    static class HelloInvocationHandler implements InvocationHandler {

        private final Object target;

        public HelloInvocationHandler(Object target) {
            this.target = target;
        }

        @Override
        public Object invoke(Object proxy, Method method, Object[] args) throws Throwable {
            System.out.println("before hello");
            Object obj = method.invoke(target, args);
            System.out.println("after hello");
            return obj;
        }
    }

    public static void main(String[] args) {

        Hello hello = new Hello();
//        IHello helloProxy = (IHello) Proxy.newProxyInstance(IHello.class.getClassLoader(), hello.getClass().getInterfaces(),
//                new HelloInvocationHandler(hello));
//        helloProxy.hello();

        Enhancer enhancer = new Enhancer();
        enhancer.setSuperclass(hello.getClass());
        enhancer.setCallback(new MethodInterceptor() {
            @Override
            public Object intercept(Object o, Method method, Object[] objects, MethodProxy methodProxy)
                    throws Throwable {
                System.out.println("pre Hello");
                methodProxy.invokeSuper(o,objects);
                System.out.println("after hello");
                return null;
            }
        });
        hello = (Hello) enhancer.create();
        hello.hello();

    }

}