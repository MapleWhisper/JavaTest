package com.maple.concurrent;

public class ThreadUtils {
    public static void sleep(long ms) {
        try {
            Thread.sleep(ms);
        } catch (InterruptedException e) {
            e.printStackTrace();
            throw new RuntimeException(e.getMessage());
        }
    }
}
