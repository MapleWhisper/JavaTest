package com.maple;

public class Main {
    public static void main(String[] args){
        char c = 'a';
        for(int i=0;i<100;i++){
            System.out.printf("%c \t",c+(i%26) ) ;
        }
    }
}
