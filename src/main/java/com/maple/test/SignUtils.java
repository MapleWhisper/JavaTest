/**
 * meituan.com Inc.
 * Copyright (c) 2010-2019 All Rights Reserved.
 */
package com.maple.test;

import lombok.extern.slf4j.Slf4j;
import org.apache.commons.lang3.StringUtils;

import java.io.UnsupportedEncodingException;
import java.net.URI;
import java.net.URLDecoder;
import java.security.MessageDigest;
import java.util.*;

/**
 * <p>
 *     互联网餐厅Sign计算工具类
 * </p>
 *
 * @author yuguanglu@meituan.com
 * @version SignUtil.class  2019-07-24 1:56 PM
 **/
@Slf4j
public class SignUtils {

    private static final String UTF_8_STR = "utf-8";

    public static void main(String[] args) {
        Map map = new HashMap<String,String>();
        map.put("appAuthToken","");
        map.put("charset","utf-8");
        map.put("timestamp","1576057621593");
        map.put("appAuthToken","");
        map.put("version","1");
        map.put("sign","");


    }



    /**
     * 判断sign是否正确
     *
     * @param sign    请求传的sign
     * @param newSign 重新计算的sign
     * @return boolean
     */
    public static boolean checkSign(String sign, String newSign) {
        if (StringUtils.isBlank(sign) || StringUtils.isBlank(newSign)) {
            return false;
        }
        if (sign.equals(newSign)) {
            return true;
        } else {
            log.warn("signature error, sign: " + sign + " newSign: " + newSign);
            return false;
        }
    }

    /**
     * 获取Sign的计算结果值
     * @param signKey   开发者入驻后，开发者中心对应的SignKey，请勿泄露
     * @param params    请求参数Map
     * @return  Sign签名值
     * @throws UnsupportedEncodingException 如果参数Params的Charset不是Utf-8，并且不是 Java所支持的编码类型，会抛出该异常，请使用utf-8编码
     */
    public static String getSign(String signKey, Map<String, String> params) throws UnsupportedEncodingException {
        String sortedStr;
        sortedStr = getSortedParamStr(params);
        String paraStr = signKey + sortedStr;
        return createSign(paraStr);
    }

    /**
     * 获取Sign的计算结果值
     * @param signKey   开发者入驻后，开发者中心对应的SignKey，请勿泄露
     * @param requestStr    请求的URL，对Url的参数值进行计算得到Sign值
     * @return  Sign签名值
     * @throws UnsupportedEncodingException 如果参数Params的Charset不是Utf-8，并且不是 Java所支持的编码类型，会抛出该异常，请使用utf-8编码
     */
    public static String getSign(String signKey, String requestStr) throws UnsupportedEncodingException {
        String sortedStr = getSortedParamStr(requestStr);
        String paraStr = signKey + sortedStr;
        return createSign(paraStr);
    }

    /**
     * 构造自然排序请求参数
     *
     * @param params 请求
     * @return 字符串
     */
    private static String getSortedParamStr(Map<String, String> params) throws UnsupportedEncodingException {
        Set<String> sortedParams = new TreeSet<>(params.keySet());

        StringBuilder strB = new StringBuilder();
        String charset = params.get("charset");
        if (StringUtils.isEmpty(charset)) {
            charset = UTF_8_STR;
        }

        boolean charsetIsUtf8 = isUtf8(charset);

        // 排除sign和空值参数
        for (String key : sortedParams) {
            if ("sign".equalsIgnoreCase(key)) {
                continue;
            }

            // 如果不是utf8格式,进行转码
            String value = charsetIsUtf8
                    ? params.get(key)
                    : new String(params.get(key).getBytes(charset), "UTF-8");

            if (StringUtils.isNotEmpty(value)) {
                strB.append(key).append(value);
            }
        }
        return strB.toString();
    }

    /**
     * 生成新sign
     *
     * @param str 字符串
     * @return String
     */
    private static String createSign(String str) {
        if (str == null || str.length() == 0) {
            return null;
        }
        char[] hexDigits = {'0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'};
        try {
            MessageDigest mdTemp = MessageDigest.getInstance("SHA1");
            mdTemp.update(str.getBytes("UTF-8"));

            byte[] md = mdTemp.digest();
            int j = md.length;
            char[] buf = new char[j * 2];
            int k = 0;
            int i = 0;
            while (i < j) {
                byte byte0 = md[i];
                buf[k++] = hexDigits[byte0 >>> 4 & 0xf];
                buf[k++] = hexDigits[byte0 & 0xf];
                i++;
            }
            return new String(buf);
        } catch (Exception e) {
            log.warn("create sign was failed", e);
            return null;
        }
    }



    private static String getSortedParamStr(String requestStr) throws UnsupportedEncodingException {
        if (StringUtils.isBlank(requestStr)) {
            return null;
        }

        Map<String, String> paramMap = new HashMap<>();
        URI uri = URI.create(requestStr);
        String query = uri.getRawQuery();
        String[] params = query.split("&");
        Arrays.stream(params).forEach(param -> {
            String[] kv = param.split("=");
            try {
                paramMap.put(kv[0], URLDecoder.decode(kv[1], UTF_8_STR));
            } catch (Exception e) {
                log.error("decode error, str:{}", kv[1]);
            }
        });

        return getSortedParamStr(paramMap);
    }

    private static boolean isUtf8(String charset) {
        return "utf8".equalsIgnoreCase(charset) || UTF_8_STR.equalsIgnoreCase(charset);
    }
}