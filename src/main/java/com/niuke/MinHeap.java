package com.niuke;

import java.util.Arrays;

public class MinHeap {
    public int data[];
    public int size;
    public int length;

    MinHeap(int size){
        this.size = size;
        data = new int[size];
        this.length = 0;
    }


    private void createHeap(int[] a) {
        for(int i=a.length-1;i>=0;i--){


            //printHeap();
            insert(a[i]);
        }
    }

    private void insert(int value) {

        if(length<size){
            data[length++]=value;
            shifUp(length-1);
        }

    }

    private void shifUp(int end) {
        int i= end;
        while(i>0){
            int parent = (i%2==0? ((i/2)-1) : i/2);
            if(data[i]<data[parent]){
                swap(i, parent);
                i = parent;
            }else{
                i--;
            }
        }

    }

    private void swap(int x, int y) {
        int tmp = data[x];
        data[x] = data[y];
        data[y] = tmp;
    }


    public static void main(String[] args){

        MinHeap heap = new MinHeap(100);
        int a[] = {5,8,22,1,99,6,77,3,44,2,55,9,33,7,11,4,0};
        //heap.printHeap();
        heap.createHeap(a);
        //System.out.println(Arrays.toString(heap.data));
        //heap.printHeap();
        heap.printSortedHeap();

    }

    private void printSortedHeap() {
        int end = length-1;
        while(end>=0){
            System.out.print(data[0]);
            swap(0,end);
            end--;
            shifUp(end);
            printHeap();
        }
    }

    private void printHeap() {
        int deep  = (int) (Math.log(length)/Math.log(2));
        int cnt = 0;
        for(int i=0;i<=deep && cnt<length;i++){
            for(int j=0;j<(deep-i)*2;j++ ){
                System.out.print("  ");
            }

            for (int j = 0; j < Math.pow(2,i); j++) {
                System.out.print(data[cnt++]);
                System.out.print(" ");
            }
            System.out.println();

        }

    }


}
