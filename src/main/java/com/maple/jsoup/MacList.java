package com.maple.jsoup;

import com.alibaba.fastjson.JSON;
import com.alibaba.fastjson.JSONArray;
import com.alibaba.fastjson.JSONObject;
import org.jsoup.Connection;
import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;

import java.io.IOException;
import java.util.*;

public class MacList {
    public static void main(String args[]) throws IOException {
        int currentPage=1;
        HashMap<String,Integer> map = new HashMap();
        String macUrl = "https://rate.tmall.com/list_detail_rate.htm?itemId=546724870335&spuId=812566288&sellerId=3170729146&order=3&append=0&content=1&tagId=&posi=&picture=&ua=098%23E1hvYpvWvRyvUpCkvvvvvjiPPFcOljEvPsdZgj3mPmPUljnHn2qpsj1EPsMyAjtVRUhCvCLwcRxuVaMwzns%2FklSMwMAQzVH49LyCvvpvvvvvvphvC9v9vvCvp8yCvv9vvUvAXu0mIgyCvvOUvvVvayVtvpvIvvvvvhCvvvvvvUnvphvheQvv96CvpC29vvm2phCvhhvvvUnvphvppvyCvhQWtyhvC0RvQRAn%2BbyDCJLIAXZTKFEw9Exr1CeKNB3r1W3lDBhcnfmxfJmK5kx%2F1W3lKbygbhcBIUkUDCODN%2B3lYE7rjC6sAXcXDLet2QhvCvvvvvm5vpvhvvmv9IwCvvpvCvvvdphvmpvpov39OvCv3FyCvvpvvvvv&isg=BBMTZg1STBbu6AMqgXXRlVWJopf9YKY5wh1wX8U0zjNLRCDmTJy62uX2evSPZP-C&needFold=0&_ksTS=1529659241091_1641";
        String yslUrl = "https://rate.tmall.com/list_detail_rate.htm?itemId=564093547806&spuId=811095643&sellerId=3626596873&order=3&append=0&content=1&tagId=&posi=&picture=&ua=098%23E1hvSvvnvPOvUpCkvvvvvjiPPsqy6jiRRLFWgjivPmPhsjnmRszysjDvPsdOQjYbRFyCvvBvpvvv9phvHn1wS0gXzYswzU2u7M%2F8zjbwOHuCdphvmZChFxmZvhCDO86CvvDvBW1pWpCvc9ujvpvhphhvvvGCvvpvvPMMmphvLhC%2BKQmFHkyZEcqhaX%2FOwZC1BJFZet3l7LXXiXhpVj%2BOUx8x9E9aWDw6pwethbUf8369D76wd3r%2FVA3laB4AVA%2BaUhzBRfpKo7gUAf0tvpvIphvvvvvvphCvpCQmvvCCi6CvjvUvvhBGphvwv9vvBHBvpCQmvvChxUyCvvXmp99hVtKivpvUphvhycZz2mUCvpvVph9vvvvvRphvChCvvvm5vpvhphvhHv%3D%3D&isg=BOvrsrEeNGy9y2uieY05rX3Reg8VqP4x2lVY111o4iqF_Ale5dCP0okuUnw3XFd6&needFold=0&_ksTS=1532941464093_885";
        String ysl1Url = "https://rate.tmall.com/list_detail_rate.htm?itemId=564092551615&spuId=283354061&sellerId=3626596873&order=3&append=0&content=1&tagId=&posi=&picture=&ua=098%23E1hvJvvPvBOvUvCkvvvvvjiPPsqy6jiPRFqp6jivPmP9ljtPPsFpQj3Un2q9sjnhRphvCvvvphmCvpvZzHs249SNznswQ2afMgdGUY197IVrvpvEvvEyavZvvEbzdphvmpmCCQEWvvmHpUhCvCLwjCHadrMwznAw%2FHSSCPsYzvr44UwCvvpv9hCviQhvCvvvpZptvpvhvvCvpvyCvhAmhaswj4ZAhCk%2FPB7HAfRTrdUK7%2B0Qrb8ceFQWiRQ1Rf8Q81mn3feAhCDT7t5xnqhTrmYCInh7rtoYW6oD6fh6HbaihI0HKfUpVjIUkphvC9hvpyPOz8yCvv9vvhhDuqltEfyCvm9vvhCvvvvvvvvvBGwvvUCsvvCj1Qvvv3QvvhNjvvvmmvvvBGwvvvUUvphvC9vhphvvvvGCvvpvvPMMRphvCvvvphv%3D&isg=BKioF0_cZxVLJEiLJtwq5MpQeZZ6eQ1oTXR7vmLZkyM-vUonC-NrajWfsRXojcSz&needFold=0&_ksTS=1532941572771_1458";
        try {
            for(;currentPage<10;currentPage++){
                System.out.println(currentPage);
                String req = ysl1Url+"&currentPage="+currentPage;
//                System.out.println(req);
                Connection.Response response = Jsoup.connect(req).execute();
                String s = response.body().trim();
                s =s.substring(13,s.length());
                JSONObject obj;
                try {
                    obj = JSON.parseObject(s);
                }catch (Exception e){
                    continue;
                }
                JSONArray list = obj.getJSONArray("rateList");
                if(list==null){
                    continue;
                }
                for(int i=0;i<list.size();i++){
                    String title = list.getJSONObject(i).getString("auctionSku");
                    System.out.println(title);
                    if(map.get(title)!=null){
                        map.put(title,map.get(title)+1);
                    }else{
                        map.put(title,1);
                    }
                }
            }
        }catch (Exception e){
            e.printStackTrace();
        }finally {
            System.out.println("------------------------------------------");
            if(!map.isEmpty()){

                List<Map.Entry<String,Integer>> list =new ArrayList(map.entrySet());
                Collections.sort(list, new Comparator<Map.Entry>() {
                    @Override
                    public int compare(Map.Entry o1, Map.Entry o2) {
                        return (Integer) o2.getValue()-(Integer)o1.getValue();
                    }
                });
                for(Map.Entry entry:list){
                    System.out.println(entry.getKey()+"\t"+entry.getValue());
                }

            }

        }
    }
}
