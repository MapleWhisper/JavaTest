/**
 * meituan.com Inc.
 * Copyright (c) 2010-2019 All Rights Reserved.
 */
package com.maple.concurrent;

import java.util.Arrays;
import java.util.List;
import java.util.concurrent.CompletableFuture;
import java.util.stream.Collectors;

/**
 * <p>
 *
 * </p>
 * @author yuguanglu
 * @version :PriceDemo.java v1.0 2019-08-15 17:56 yuguanglu Exp $
 */
public class PriceDemo {
    private List<Shop> shops = Arrays.asList(new Shop("shop1"),
            new Shop("shop2"),
            new Shop("shop3"),
            new Shop("shop4"),
            new Shop("shop5"),
            new Shop("shop6"),
            new Shop("shop7"),
            new Shop("shop8")
    );

    public List<String> findPrices(String product){
        return shops.stream().map(shop -> String.format("%s price is %.2f ",shop.getName(),shop.getPice(product)))
                .collect(Collectors.toList());
    }

    public List<String> findPricesParallel(String product){
        /*
         * 方法一：加并行流.parallel()
         * */
        return shops.stream().parallel().map(shop -> String.format("%s price is %.2f ",shop.getName(),shop.getPice(product)))
                .collect(Collectors.toList());
    }

    public List<String> findPricesFutrue(String product){

        return shops.stream().parallel().map(shop -> String.format("%s price is %.2f ",shop.getName(),shop.getPice(product)))
                .collect(Collectors.toList());
    }

    public static void main (String[] args){
        PriceDemo priceDemo = new PriceDemo();
        Long start = System.currentTimeMillis();
        System.out.println(priceDemo.findPrices("苹果x"));
        System.out.println("服务耗时："+(System.currentTimeMillis()-start));

        start = System.currentTimeMillis();
        System.out.println(priceDemo.findPricesParallel("苹果x"));
        System.out.println("服务耗时："+(System.currentTimeMillis()-start));
    }
}