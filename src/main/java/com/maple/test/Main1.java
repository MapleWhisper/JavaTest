package com.maple.test;

import java.util.Scanner;
import java.util.Stack;


public class Main1 {



    public static boolean match(char c[]){
        Stack<Character> sc=new Stack<Character>();

        for (int i = 0; i < c.length; i++) {

            if(c[i]==' '){
                continue;
            }

            if (c[i]=='(') {
                sc.push(c[i]);
            }
            else if(c[i]==')'){
                if(sc.isEmpty()){
                    return false;
                }
                if (sc.peek()=='(') {
                    sc.pop();
                }
            }
        }
        if (sc.empty()) {
            return true;
        }else {
            return false;
        }
    }

    /**
     * @param args
     */
    public static void main(String[] args) {
        int i = 11, j = 5;
        switch(i/j){
            case 3:
                j+=i;
            case 2:
                j +=4;
            case 4:
                j+=5;
            case 1:
                j +=1;
                break;

        }
        System.out.println(j);
/*        Scanner scanner = new Scanner(System.in);
        String s = scanner.nextLine();
        int sum = 0;
        int matchIndex = -1;
        char[] c=s.toCharArray();
        for(int i=0;i<c.length;i++){
            if(c[i]=='('){
                c[i]=' ';
                matchIndex = -1;
                int cnt = 0;
                for(int j=i+1;j<c.length;j++){
                    if(c[j]==')'){
                        c[j]=' ';
                        if(match(c)){
                            cnt++;
                            matchIndex = j;
                        }
                        c[j]=')';
                    }
                }
                if(matchIndex>0){
                    if(sum==0){
                        sum = cnt;
                    }else{
                        sum*=cnt;
                    }
                    c[matchIndex]=' ';
                }else{
                    // not match
                    break;
                }
            }
        }
        System.out.println(sum);*/

//        System.out.println(" "+'b'+1);
    }
}



