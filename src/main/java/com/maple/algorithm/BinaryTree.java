/**
 * meituan.com Inc.
 * Copyright (c) 2010-2018 All Rights Reserved.
 */
package com.maple.algorithm;

import apple.laf.JRSUIUtils;
import com.alibaba.fastjson.JSON;

/**
 * <p>
 *
 * </p>
 * @auther yuguanglu
 * @version $Id:BinaryTree.java v1.0 2018/8/15 下午12:06 maple Exp $
 */
public class BinaryTree {
    public static void main(String []args){
        int a[] = new int[]{10,8,9,6,12,11,13};
        TreeNode treeNode = createBinaryTree(a);
//        System.out.println(JSON.toJSONString(treeNode,true));
        System.out.println(find(treeNode,13).val);
        System.out.println(findClose(treeNode,7).val);
    }

    private static TreeNode findClose(TreeNode root , int val ){
        if(root==null || root.val == val ){
            return root;
        }
        if(val<root.val){
            if(root.left==null){
                return root;
            }else{
                TreeNode leftChild = findClose(root.left,val);
                return Math.abs(root.val-val)<=Math.abs(leftChild.val-val)?root:leftChild;

            }
        }else{
            if(root.right==null){
                return root;
            }else{
                TreeNode rightClild = findClose(root.right,val);
                return Math.abs(root.val-val)<=Math.abs(rightClild.val-val)?root:rightClild;
            }
        }
    }

    private static TreeNode find(TreeNode root , int val){
        if(root==null){
            return null;
        }
        if(root.val == val){
            return root;
        }
        if(val<root.val){
            return find(root.left,val);
        }else{
            return find(root.right,val);
        }
    }

    private static TreeNode insertNode(TreeNode root, int val){
        if(root==null){
            return new TreeNode(val);
        }
        if(root.val<val){
            root.right = insertNode(root.right,val);
        }else{
            root.left = insertNode(root.left,val);
        }
        return root;
    }
    private static TreeNode createBinaryTree(int[] a) {
        TreeNode root = null;
        for(int i : a){
            root = insertNode(root,i);
        }
        return root;
    }
}
