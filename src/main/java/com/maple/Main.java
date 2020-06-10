package com.maple;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.Random;
import java.util.Scanner;

public class Main implements TestInter {
    private String name;

    public static Scanner scan   = new Scanner(System.in);
    static        Random  random = new Random();

    public static void main(String[] args) throws IOException {
        int n = 1000000;
        long start = System.currentTimeMillis();
        for (int i = 0; i < 1; i++) {
            List l1 = new ArrayList();
            for (int j = 0; j < n; j++) {
                l1.add(i);
            }
        }
        long end = System.currentTimeMillis();
        System.out.println(end - start);

        start = System.currentTimeMillis();
        for (int i = 0; i < 1; i++) {
            List l1 = new ArrayList(n);
            for (int j = 0; j < n; j++) {
                l1.add(i);
            }
        }
        end = System.currentTimeMillis();
        System.out.println(end - start);

    }

}