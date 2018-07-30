package com.maple.jsoup;

import com.alibaba.fastjson.JSON;
import com.alibaba.fastjson.JSONArray;
import com.alibaba.fastjson.JSONObject;
import org.jsoup.Connection;
import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;

import java.io.IOException;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class MacList {
    public static void main(String args[]) throws IOException {
        int currentPage=1;
        HashMap<String,Integer> map = new HashMap();
        String baseUrl = "https://rate.tmall.com/list_detail_rate.htm?itemId=546724870335&spuId=812566288&sellerId=3170729146&order=3&append=0&content=1&tagId=&posi=&picture=&ua=098%23E1hvYpvWvRyvUpCkvvvvvjiPPFcOljEvPsdZgj3mPmPUljnHn2qpsj1EPsMyAjtVRUhCvCLwcRxuVaMwzns%2FklSMwMAQzVH49LyCvvpvvvvvvphvC9v9vvCvp8yCvv9vvUvAXu0mIgyCvvOUvvVvayVtvpvIvvvvvhCvvvvvvUnvphvheQvv96CvpC29vvm2phCvhhvvvUnvphvppvyCvhQWtyhvC0RvQRAn%2BbyDCJLIAXZTKFEw9Exr1CeKNB3r1W3lDBhcnfmxfJmK5kx%2F1W3lKbygbhcBIUkUDCODN%2B3lYE7rjC6sAXcXDLet2QhvCvvvvvm5vpvhvvmv9IwCvvpvCvvvdphvmpvpov39OvCv3FyCvvpvvvvv&isg=BBMTZg1STBbu6AMqgXXRlVWJopf9YKY5wh1wX8U0zjNLRCDmTJy62uX2evSPZP-C&needFold=0&_ksTS=1529659241091_1641";
        try {
            for(;currentPage<300;currentPage++){
                System.out.println(currentPage);
                String req = baseUrl+"&currentPage="+currentPage;
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
            for(Map.Entry entry: map.entrySet()){
                System.out.println(entry.getKey()+"\t"+entry.getValue());
            }
        }
    }
}
