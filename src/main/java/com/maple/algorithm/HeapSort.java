/**
 * meituan.com Inc.
 * Copyright (c) 2010-2018 All Rights Reserved.
 */
package com.maple.algorithm;

import java.util.Arrays;

/**
 * <p>
 *
 * </p>
 * @auther yuguanglu
 * @version $Id:HeapSort.java v1.0 2018/8/9 上午11:11 maple Exp $
 */
public class HeapSort {


    public static void swap(int[] a ,int i , int j ){
        int tmp = a[i];
        a[i] = a[j];
        a[j] = tmp;
    }

    public static void heapSort(int a[]){
        int len  = a.length-1;
        for(int i= len/2-1;i>=0;i-- ){
            adjustHeap(a,i,len);
        }

        while(len>=0){
            swap(a,0,len--);
            adjustHeap(a,0,len);
        }
    }

    public static void adjustHeap(int a[],int i, int n){
        int left ,right,max;
        while ((left=i*2+1)<=n){
            right = left+1;
            max = left;
            if(right<n && a[right]>a[left]){
                max = right;
            }
            if(a[i]<a[max]){
                swap(a,i,max);
            }else{
                break;
            }
            i = max;
        }
    }

    public static void main(String []args){
        int a[] = new int[]{5,7,9,1,2,4,6,9,0,2,6,3};
        heapSort(a);
        for(int i :a ){
            System.out.print(i+" ");
        }
    }
}
