/**
 * meituan.com Inc.
 * Copyright (c) 2010-2019 All Rights Reserved.
 */
package com.maple.concurrent;

import java.util.Random;
import java.util.concurrent.CompletableFuture;
import java.util.concurrent.Future;

/**
 * <p>
 *
 * </p>
 * @author yuguanglu
 * @version :Shop.java v1.0 2019-08-15 17:53 yuguanglu Exp $
 */
public class Shop {

    Random random = new Random();

    private String name;

    public Shop(String name) {
        this.name = name;
    }

    public static void delay() {
        try {
            Thread.sleep(1000L);
        } catch (Exception e) {
            throw new RuntimeException(e);
        }
    }

    public double getPice(String product) {
        delay();
        return random.nextDouble() * 100;
    }

    public Future<Double> getPriceAsync(String product) {
        //CompletableFuture<Double> futurePrice = new CompletableFuture<>();
        //new Thread(() -> futurePrice.complete(getPice(product))).start();
        /*
         * supplyAsync()该方法对线程异常进行处理，避免出现异常后的堵塞
         * */
        return CompletableFuture.supplyAsync(() -> (getPice(product)));
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public static void main(String[] args) throws Exception {
        Shop show = new Shop("bestShow");
        long start = System.currentTimeMillis();
        Future<Double> futurePrice = show.getPriceAsync("some product");
        System.out.println("调用返回，耗时" + (System.currentTimeMillis() - start));
        double price = futurePrice.get();
        System.out.println("价格返回，耗时" + (System.currentTimeMillis() - start));

    }

}
