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
        String macLip = "https://rate.tmall.com/list_detail_rate.htm?itemId=546724870335&spuId=812566288&sellerId=3170729146&order=3&append=0&content=1&tagId=&posi=&picture=&ua=098%23E1hvYpvWvRyvUpCkvvvvvjiPPFcOljEvPsdZgj3mPmPUljnHn2qpsj1EPsMyAjtVRUhCvCLwcRxuVaMwzns%2FklSMwMAQzVH49LyCvvpvvvvvvphvC9v9vvCvp8yCvv9vvUvAXu0mIgyCvvOUvvVvayVtvpvIvvvvvhCvvvvvvUnvphvheQvv96CvpC29vvm2phCvhhvvvUnvphvppvyCvhQWtyhvC0RvQRAn%2BbyDCJLIAXZTKFEw9Exr1CeKNB3r1W3lDBhcnfmxfJmK5kx%2F1W3lKbygbhcBIUkUDCODN%2B3lYE7rjC6sAXcXDLet2QhvCvvvvvm5vpvhvvmv9IwCvvpvCvvvdphvmpvpov39OvCv3FyCvvpvvvvv&isg=BBMTZg1STBbu6AMqgXXRlVWJopf9YKY5wh1wX8U0zjNLRCDmTJy62uX2evSPZP-C&needFold=0&_ksTS=1529659241091_1641";
        String esteeDw = "https://rate.tmall.com/list_detail_rate.htm?itemId=530542339390&spuId=566098321&sellerId=2064892827&order=3&append=0&content=1&tagId=&posi=&picture=&ua=098%23E1hv5vvRvpWvUpCkvvvvvjiPPsMhQjiEnLFWzjljPmPUljDnPLcpgjrmPFd9gj1nR46CvvDvp9GGzpCvj%2BArvpvEphU7PUgvpCjIiQhvChCvCCpPvpvhMMGvvvhCvvXvovvvvvvEvpCWBhDbv8RfjLWspqVDR3BkpVDHD70fd56OVAtlK2eAnDWApX79DCODN5ZIYE7re16s8y7DKBpBOyr%2Bm7zwdigDN59DfX7re3lvfvc6DfyCvm3vpvCwvvCvphCvHUUvvhHqphvZ99vvpGavpComvvC2f6CvHUUvvhniuphvmhCvCEjtJgDCkphvCyEmmvQfj2yCvvBvpvvv3QhvChCCvvmrvpvEphbBhEyvpjUh9phvHHiaylm7zHi47dSutssU7il4NrGBRphvChCvvvv%3D&isg=BCcnGiQUMF8A4rVYnI-EH9Kgtl1dv4GlEsbf4PmWQLaL6ECqAn_n3peKDqhTANMG&needFold=0&_ksTS=1533101419408_2104";
        String baseUrl = esteeDw;
        try {
            for(;currentPage<30;currentPage++){
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
                    if(title.startsWith("颜色分类:")){
                        title = title.substring(5);
                    }
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
            List<Map.Entry<String,Integer>> list = new ArrayList(map.entrySet());
            Collections.sort(list, new Comparator<Map.Entry<String,Integer>>() {
                @Override
                public int compare(Map.Entry<String, Integer> o1, Map.Entry<String, Integer> o2) {
                    return o2.getValue()-o1.getValue();
                }
            });
            list.forEach(entry->System.out.println(entry.getKey()+" "+entry.getValue()));
        }
    }
}
