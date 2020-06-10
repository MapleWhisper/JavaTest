/**
 * meituan.com Inc.
 * Copyright (c) 2010-2018 All Rights Reserved.
 */
package com.maple.algorithm;

import com.alibaba.fastjson.JSON;

/**
 * <p>
 *
 * </p>
 * @auther yuguanglu
 * @version $Id:QuickSort.java v1.0 2018/8/14 下午5:26 maple Exp $
 */
public class QuickSort {

    public static void quickSort(int a[], int low, int high) {
        if (low < high) {
            int partion = partition(a, low, high);
            quickSort(a, low, partion - 1);
            quickSort(a, partion + 1, high);
        }
    }

    private static void swap(int a[], int x, int y) {
        int tmp = a[x];
        a[x] = a[y];
        a[y] = tmp;
    }

    private static int partition(int a[], int low, int high) {
        if (low >= high) {
            return low;
        }
        swap(a, low, high);
        int idx = low;
        for (int i = low; i < high; i++) {
            if (a[i] < a[high]) {
                swap(a, idx++, i);
            }
        }
        swap(a, idx, high);
        return idx;
    }

    public static void main(String[] args) {
        int a[] = new int[] { 5, 6, 7, 1, 2, 9, 8, 3, 5, 7, 0, 2, 6, 7, 3 };
        quickSort(a, 0, a.length - 1);
        System.out.println(JSON.toJSONString(a));
    }
}
