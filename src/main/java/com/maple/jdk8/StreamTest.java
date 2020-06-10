package com.maple.jdk8;

import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.function.Function;
import java.util.stream.Collectors;

public class StreamTest {
    public static void main(String args[]){
        List<Integer> list = new ArrayList<Integer>();
        list.add(1);
        list.add(5);
        list.add(10);
        list.add(20);

        list.stream().map(x-> x*x).forEach(x->System.out.print(x+" "));
        System.out.println();

        List<Integer> list1 = list.stream().filter(x->x%2==0).collect(Collectors.toList());



        Function<String,String> f= (input)-> input;

        System.out.println(f.apply("input"));



    }

    public static  String invoke(Function<String,String> function){

        return function.apply("input");
    }
}
