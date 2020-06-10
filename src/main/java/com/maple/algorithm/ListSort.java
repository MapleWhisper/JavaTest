/**
 * meituan.com Inc.
 * Copyright (c) 2010-2018 All Rights Reserved.
 */
package com.maple.algorithm;

import com.alibaba.fastjson.JSON;

import java.util.List;

/**
 * <p>
 *
 * </p>
 * @auther yuguanglu
 * @version $Id:QuickSort.java v1.0 2018/8/14 下午5:26 maple Exp $
 */
public class ListSort {

    public static void quickSort(ListNode head, ListNode tail){
        if(head!=tail && head.next != tail){
            ListNode partition = partition(head,tail);
            quickSort(head,partition);
            quickSort(partition.next,tail);
        }
    }

    private static void swap(ListNode x, ListNode y){
        int tmp = x.val;
        x.val = y.val;
        y.val = tmp;
    }

    private static ListNode partition(ListNode head, ListNode tail) {
        ListNode idx = head;
        int key = head.val;
        ListNode node = head.next;
        for(;node!=tail;node=node.next){
            if(node.val<key){
                idx = idx.next;
                swap(node,idx);
            }
        }
        swap(idx,head);
        return idx;

    }

    public static ListNode insertSort(ListNode head){
        if(head==null || head.next == null){
            return head;
        }
        ListNode pstart= new ListNode(0);
        ListNode pend = head;
        pstart.next = head;
        ListNode p = head.next;
        while(p!=null) {
            ListNode tmp = pstart.next;
            ListNode pre = pstart;
            while (tmp != p && tmp.val <= p.val) {
                tmp = tmp.next;
                pre = pre.next;
            }
            if (tmp == p) {
                pend = p;
            } else {
                pend.next = p.next;
                p.next = tmp;
                pre.next = p;
            }
            p = pend.next;
        }
        return pstart.next;
    }

    public static void main(String []args){
        ListNode listNode = new ListNode(3);
        listNode.next = new ListNode(2);
        listNode.next.next = new ListNode(1);
        listNode.next.next.next = null;

//        quickSort(listNode,null);
        listNode = insertSort(listNode);
        System.out.println(JSON.toJSONString(listNode,true));

    }
}
