/**
 * meituan.com Inc.
 * Copyright (c) 2010-2020 All Rights Reserved.
 */
package com.maple.concurrent;

import javax.security.auth.callback.Callback;
import java.lang.reflect.Array;
import java.util.*;
import java.util.concurrent.*;
import java.util.concurrent.locks.Condition;
import java.util.concurrent.locks.ReentrantLock;
import java.util.stream.Collectors;

/**
 * <p>
 *
 * </p>
 * @author yuguanglu
 * @version :ThreadNumberTest.java v1.0 2020-01-07 20:06 yuguanglu Exp $
 */
public class ThreadNumberTest {

    private static volatile boolean start = false;
    private static volatile boolean stop  = false;
    private static Random random = new Random();

    public static void main(String[] args) throws InterruptedException {
        int threadCnt = 8;
        ExecutorService pool = Executors.newFixedThreadPool(threadCnt);
        List<Future<Long>> list = new ArrayList<>(threadCnt);
        for (int i = 0; i < threadCnt; i++) {
            list.add(pool.submit(new AddTask()));
        }
        ThreadUtils.sleep(2000);
        Long s1 = System.currentTimeMillis();
        start = true;
        ThreadUtils.sleep(10 * 1000);
        stop = true;
        Long s2 = System.currentTimeMillis();
        System.out.println(s2 - s1);
        pool.shutdownNow();
        Long s3 = System.currentTimeMillis();
        System.out.println(s3 - s1);
        LongSummaryStatistics longSummaryStatistics = list.stream().collect(Collectors.summarizingLong(f -> {
            try {
                return f.get();
            } catch (Exception e) {
                e.printStackTrace();
                return 0;
            }
        }));
        System.out.println(longSummaryStatistics.getSum());

    }

    public static class AddTask implements Callable<Long> {
        int a[] = new int[32768];
        long i = 0;
        {
            Arrays.fill(a,100);
        }

        @Override
        public Long call() throws Exception {
            while (!start) {

            }
            System.out.println("cnt");
            while (!stop) {

                if(a[10000]==100){
                    i++;
                }

            }
            System.out.println(i);
            return i;
        }
    }
}
