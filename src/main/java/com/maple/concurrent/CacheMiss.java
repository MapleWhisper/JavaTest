/**
 * meituan.com Inc.
 * Copyright (c) 2010-2020 All Rights Reserved.
 */
package com.maple.concurrent;

import java.util.ArrayList;
import java.util.List;
import java.util.concurrent.*;
import java.util.stream.Collectors;

/**
 * <p>
 *
 * </p>
 * @author yuguanglu
 * @version :CacheMiss.java v1.0 2020-01-17 14:23 yuguanglu Exp $
 */
public class CacheMiss {
    public static void main(String[] args) throws InterruptedException {
        List<Integer> intList = new ArrayList<>();
        int size = 10000000;
        for (int i = 0; i < size; i++) {
            intList.add(i);     //初始化大约38MB的数据。
        }
        System.out.println("Main Thread : " + Thread.currentThread().getName());
        int n = 8;
        for (int i = 0; i < n; i++) {
            doSomeRandomOperationInList(intList);   //单线程执行相同的数据，因为内存的数据会被缓存到CPU Cache，可以提高性能
        }

        System.out.println(n + "个线程同时执行开始:");
        CountDownLatch latch = new CountDownLatch(n);
        for (int j = 0; j < n; j++) {
            runAsync(intList, n + "-" + j, latch);  //8个线程同时执行，访问共享数据，Cpu CacheMiss增加，性能严重降低
        }
        latch.await();
        System.out.println(n + "个线程同时执行结束\n\n");

        for (int i = 1; i <= n; i++) {
            System.out.println(i + "个线程同时执行开始:");
            latch = new CountDownLatch(i);
            for (int j = 0; j < i; j++) {
                runAsync(intList, i + "-" + j, latch);  //不同的线程数量同时执行，对性能的影响
            }
            latch.await();
            System.out.println(i + "个线程同时执行结束\n\n");
        }

    }

    private static void runAsync(List<Integer> intList, String threadName, CountDownLatch latch) {
        CompletableFuture.runAsync(() -> {
            System.out.println("new thread - " + threadName + " : " + Thread.currentThread().getName());
            long s = System.currentTimeMillis();
            List<Integer> l = intList.stream().map(i -> i * 2).collect(Collectors.toList());
            long e = System.currentTimeMillis();
            System.out.println("Thread : " + s + " : " + (e - s));
            latch.countDown();
        });
    }

    private static void doSomeRandomOperationInList(List<Integer> intList) {
        long startTime = System.currentTimeMillis();
        intList.stream().map(i -> i * 2).collect(Collectors.toList());
        long endTime = System.currentTimeMillis();
        System.out.println(
                "Thread : " + Thread.currentThread().getName() + " : Time Taken in (ms) : " + (endTime - startTime));
    }
}
