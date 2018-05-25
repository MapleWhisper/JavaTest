package com.maple;


import java.util.Scanner;
import java.util.Stack;

public class Main {

    public static Scanner scan = new Scanner(System.in);


    public static void test1() {
        String s = scan.nextLine();
        char str[] = s.toCharArray();
        int sum = 0;
        for (int i = 0; i < str.length; i++) {
            if(i==0){
                sum++;
            }else if(i==1){
                sum++;
                if(isHuiWen(s.substring(0,i+1))){
                    sum++;
                }
            }else{
                sum++;
                if(isHuiWen(s.substring(0,i+1))){
                    sum++;
                }
                for(int j=0;j<i;j++){
                    if(str[j]==str[i]){
                        sum++;
                        break;
                    }
                }
            }
        }
        System.out.println(sum);
    }



    private static boolean isHuiWen(String s) {
        StringBuilder sb = new StringBuilder(s);
        sb.reverse();//将str倒置的方法
        String newStr = new String(sb);
        return s.equals(newStr);
    }

//    public static void test2() {
//        int n = scan.nextInt();
//        while (n > 0) {
//            n--;
//            long k = scan.nextInt();
//            if (k % 2 != 0) {
//                System.out.println("No");
//            } else {
//                if (k == 2) {
//                    System.out.println("1 2");
//                } else {
//                    int find = 0;
//                    for (long y = 2; y < k / 2; y += 2) {
//                        if ((k / y) % 2 != 0 && k % y == 0) {
//                            find = 1;
//                            System.out.println(k / y + " " + y);
//                            break;
//                        }
//                    }
//                    if (find == 0) {
//                        System.out.println("No");
//                    }
//
//                }
//            }
//        }
//    }

    public static void test3() {
        int n = scan.nextInt();
        String s = scan.nextLine();
        while (n > 0) {
            n--;
            String str = scan.nextLine();

            Stack<Character> stack = null;
            // 如果该String长度为奇数，不匹配
            if (str.length() % 2 == 1) {
                System.out.println("No");
            } else {
                stack = new Stack<Character>();

                for (int i = 0; i < str.length(); i++) {
                    if (stack.isEmpty()) {
                        stack.push(str.charAt(i));
                    } else if ((stack.peek() == '(' && str.charAt(i) == ')')){
                        stack.pop();
                    } else {
                        stack.push(str.charAt(i));
                    }
                }

                if (stack.size() == 2) {
                    System.out.println("Yes");
                } else {
                    System.out.println("No");
                }
            }

        }


    }

    public static void main(String[] args) {
        test1();
    }

}