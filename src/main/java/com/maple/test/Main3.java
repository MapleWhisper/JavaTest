package com.maple.test;

import java.util.HashMap;
import java.util.Random;

/**
 * Created by 82760 on 2017/7/27.
 */
public class Main3 {
    public static void main(String[] args) {
        int n = 100000;
        int a[]  = new int[n];
        Random random = new Random();
        HashMap<Integer,Integer> map = new HashMap<Integer, Integer>();
        int ff_cnt = 0;
        int ff_index = 10;
        for(int i =ff_index+1; i<n;i++){
            a[i] = random.nextInt(0xaa);
            if((i-ff_index)%256==0){
                ff_cnt++;
                a[i]=0xff;
            }
            map.put(i,ff_cnt);

        }

        for(int i =ff_index+1; i<n;i++){
            ff_cnt = (i-ff_index)/0x100;
            if(ff_cnt!=map.get(i)){
                System.out.printf("i %d  ff_right %d    ff_test %d\n",i,map.get(i),ff_cnt);
            }


        }

    }
}
