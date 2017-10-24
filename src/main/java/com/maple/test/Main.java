package com.maple.test;



import java.io.UnsupportedEncodingException;
import java.math.BigDecimal;
import java.nio.charset.Charset;
import java.util.*;

public class Main {

    public void f(Object o){
        System.out.println("o");

    }
    public void f(String s){
        System.out.println("s");
    }

    public static void main(String[] args)  {

        Main m = new Main();
        m.f(null);


    }
}

