package com.maple.concurrent;

import java.util.concurrent.CompletableFuture;
import java.util.concurrent.ExecutionException;
import java.util.concurrent.Executors;

public class CompletableFutureTest {

    public static void main(String[] args) throws ExecutionException, InterruptedException {
        CompletableFuture<Void> future = CompletableFuture.runAsync(()->{
            ThreadUtils.sleep(1);
            System.out.println("future1 end");
        }).runAfterBoth(CompletableFuture.runAsync(()->{
            ThreadUtils.sleep(1000);
            System.out.println("future2 end");
        }),()->{
            System.out.println("future end");
        });
        future.join();

        System.out.println("main  end");
    }
}

