package com.leetcode;

import java.util.*;

public class Solution {


    public static Random random = new Random();

    public static void main(String[] args){

        Solution solution = new Solution();
//        int a[] = new int[100];
//        for(int i=0;i<100;i++){
//            a[i] = random.nextInt(100);
//            if(i%3==0){
//                a[i] = 0-a[i];
//            }
//        }
        int a[] = new int[]{1,4,3,2};
        System.out.println(solution.arrayPairSum(a));

    }

    public int arrayPairSum(int[] nums) {
        Arrays.sort(nums);
        int ans = 0;

        for(int i=0;i<nums.length;i+=2){
            ans+=nums[i];
        }

        return ans;



    }


    public static class TreeNode {
      int val;
      TreeNode left;
      TreeNode right;
      TreeNode(int x) { val = x; }
  }

    public TreeNode mergeTrees(TreeNode t1, TreeNode t2) {
        int t1Val = 0;
        int t2Val = 0;

        if(t1==null){
            // t1 tree is NULL ,
            if(t2==null){
                return null;
            }else{
                t1 = new TreeNode(t2.val);
                return t1;
            }

        }
        t1Val = t1.val;
        if(t2!=null){
            t2Val =t2.val;
        }
        t1.val = t1Val+t2Val;
        if(t1.left==null && t2!=null && t2.left!=null){
            t1.left = new TreeNode(0);
        }
        if(t1.right==null && t2!=null && t2.right!=null){
            t1.right = new TreeNode(0);
        }
        mergeTrees(t1.left,t2==null?null:t2.left);
        mergeTrees(t1.right,t2==null?null:t2.right);
        return t1;


    }


    public boolean judgeCircle(String moves) {

        int uCnt = 0;
        int dCnt = 0;
        int lCnt = 0;
        int rCnt = 0;
        for(char c: moves.toCharArray()){
            switch (c){
                case 'U':
                    uCnt++;
                    break;
                case 'D':
                    dCnt++;
                    break;
                case 'L':
                    lCnt++;
                    break;
                case 'R':
                    rCnt++;
                    break;
                default:
                    throw new IllegalArgumentException();

            }
        }
        return uCnt==dCnt && lCnt==rCnt;

    }


    public int hammingDistance(int x, int y) {
        return Integer.bitCount(x^y);
    }


    public int[] twoSum(int[] nums, int target) {

        HashMap<Integer,Integer> map = new HashMap();
        for(int i = 0 ;i<nums.length;i++){
            int val = nums[i];
            if(map.containsKey(target-val)){
                return new int[]{map.get(target-val),i};
            }
            map.put(nums[i],i);
        }
        return null;

    }
}
