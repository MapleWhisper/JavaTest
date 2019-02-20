package com.maple;


import com.alibaba.fastjson.JSON;

import java.util.*;

public class Main {

    public static Scanner scan = new Scanner(System.in);

    public static void main(String[] args) {

        int i = scan.nextInt();
        scan.nextLine();
        while ((i--) != 0) {
            String line = scan.nextLine();
            String lines[] = line.split(" ");
            int x = Integer.parseInt(lines[0]);
            int a = Integer.parseInt(lines[1]);
            int c = Integer.parseInt(lines[2]);
            int y = Integer.parseInt(lines[3]);
            int b = Integer.parseInt(lines[4]);
            int d = Integer.parseInt(lines[5]);
            int sumcnt = y / a + x / b+10;
            LinkedList<Integer> xtime = new LinkedList<>();
            for (int j = 1, cnt = 0; cnt < sumcnt; j += c, cnt++) {
                xtime.add(j);
            }
            LinkedList<Integer> ytime = new LinkedList<>();
            for (int j = 1, cnt = 0; cnt < sumcnt; j += d, cnt++) {
                ytime.add(j);
            }
//            System.out.println(JSON.toJSONString(xtime));
//            System.out.println(JSON.toJSONString(ytime));
            while (x > 0 && y > 0) {
                int t1 = xtime.getFirst();
                int t2 = ytime.getFirst();
                if (t1 < t2) {
                    xtime.removeFirst();
                    y -= a;
                } else if (t1 > t2) {
                    x -= b;
                    ytime.removeFirst();
                } else {
                    y -= a;
                    x -= b;
                    ytime.removeFirst();
                    xtime.removeFirst();
                }

                if (x <= 0 && y > 0) {
                    System.out.println("XIAOCHUN");
                    break;
                } else if (y <= 0 && x > 0) {
                    System.out.println("XIAOZHI");
                    break;
                } else if (x <= 0 && y <= 0) {
                    System.out.println("TIE");
                    break;
                }
            }

        }

    }
}