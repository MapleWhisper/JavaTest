package com.maple.test;

import com.alibaba.fastjson.JSON;
import com.sun.scenario.effect.impl.sw.java.JSWColorAdjustPeer;

public class Main1 {

    public static void main(String[] args) {

        int a[] = { 9, 4, 2, 6, 2, 5, 6, 8, 1, 0, 9, 5, 4, 7, 0 };
        new Main1().qsort(a, 0, a.length - 1);
        System.out.println(JSON.toJSONString(a));
    }

    public void qsort(int a[], int left, int right) {
        if (left < right) {
            int p = partion(a, left, right);
            qsort(a, left, p - 1);
            qsort(a, p + 1, right);
        }

    }

    private int partion(int[] a, int left, int right) {
        if (left >= right) {
            return left;
        }
        int target = a[left];
        swap(a, left, right);
        int j = right;
        int i = left;
        for (i = left; i < right; i++) {
            if (i == j) {
                break;
            }
            if (a[i] > target && i < j) {

                while (a[j] > target && j > i) {
                    j--;
                }
                if (a[j] <= target) {
                    swap(a, i, j);
                }

            }

        }
        swap(a, i, right);
        return i;
    }

    private void swap(int a[], int i, int j) {
        int tmp = a[i];
        a[i] = a[j];
        a[j] = tmp;
    }
}



