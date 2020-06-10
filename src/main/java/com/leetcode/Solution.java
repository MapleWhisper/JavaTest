package com.leetcode;

import com.alibaba.fastjson.JSON;
import com.maple.algorithm.ListNode;

import java.util.*;

public class Solution {

    public static Random random = new Random();

    public static void main(String[] args) {

        Solution solution = new Solution();
        //        int a[] = new int[100];
        //        for(int i=0;i<100;i++){
        //            a[i] = random.nextInt(100);
        //            if(i%3==0){
        //                a[i] = 0-a[i];
        //            }
        //        }
        //        int a[] = new int[]{1,4,3,2};
        //        System.out.println(solution.arrayPairSum(a));

//        solution.test1();

        ListNode l1 = new ListNode(2);
        l1.next = new ListNode(4);
        l1.next.next = new ListNode(3);

        ListNode l2 = new ListNode(5);
        l2.next = new ListNode(6);
        l2.next.next = new ListNode(6);
        ListNode n = solution.addTwoNumbers(l1,l2);
        System.out.println(JSON.toJSON(n));

    }

    public int arrayPairSum(int[] nums) {
        Arrays.sort(nums);
        int ans = 0;

        for (int i = 0; i < nums.length; i += 2) {
            ans += nums[i];
        }

        return ans;

    }

    public static class TreeNode {
        int      val;
        TreeNode left;
        TreeNode right;

        TreeNode(int x) {
            val = x;
        }
    }

    public TreeNode mergeTrees(TreeNode t1, TreeNode t2) {
        int t1Val = 0;
        int t2Val = 0;

        if (t1 == null) {
            // t1 tree is NULL ,
            if (t2 == null) {
                return null;
            } else {
                t1 = new TreeNode(t2.val);
                return t1;
            }

        }
        t1Val = t1.val;
        if (t2 != null) {
            t2Val = t2.val;
        }
        t1.val = t1Val + t2Val;
        if (t1.left == null && t2 != null && t2.left != null) {
            t1.left = new TreeNode(0);
        }
        if (t1.right == null && t2 != null && t2.right != null) {
            t1.right = new TreeNode(0);
        }
        mergeTrees(t1.left, t2 == null ? null : t2.left);
        mergeTrees(t1.right, t2 == null ? null : t2.right);
        return t1;

    }

    public boolean judgeCircle(String moves) {

        int uCnt = 0;
        int dCnt = 0;
        int lCnt = 0;
        int rCnt = 0;
        for (char c : moves.toCharArray()) {
            switch (c) {
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
        return uCnt == dCnt && lCnt == rCnt;

    }

    public int hammingDistance(int x, int y) {
        return Integer.bitCount(x ^ y);
    }

    public int[] twoSum(int[] nums, int target) {

        HashMap<Integer, Integer> map = new HashMap();
        for (int i = 0; i < nums.length; i++) {
            int val = nums[i];
            if (map.containsKey(target - val)) {
                return new int[] { map.get(target - val), i };
            }
            map.put(nums[i], i);
        }
        return null;

    }

    public void test1() {
        int a[] = new int[] { 1, 2, 3, 4 };
        int left[] = new int[4];
        int right[] = new int[4];

        int c = a[0];
        for (int i = 0; i < 4; i++) {
            left[i] = c * a[i];
            c = left[i];
        }
        System.out.println(Arrays.toString(left));

        c = 1;
        for (int i = 3; i >= 0; i--) {
            right[i] = c * a[i];
            c = right[i];
        }
        System.out.println(Arrays.toString(right));

        for (int i = 0; i < 4; i++) {
            int lv = 1;
            int rv = 1;
            if (i - 1 >= 0) {
                lv = left[i - 1];
            }
            if (i + 1 < 4) {
                rv = right[i + 1];
            }
            a[i] = lv * rv;
        }
        System.out.println(Arrays.toString(a));

    }

    public int[] productExceptSelf(int[] nums) {
        int a[] = nums;
        int left[] = new int[a.length];
        int right[] = new int[a.length];

        int c = 1;
        for (int i = 0; i < a.length; i++) {
            left[i] = c * a[i];
            c = left[i];
        }

        c = 1;
        for (int i = a.length - 1; i >= 0; i--) {
            right[i] = c * a[i];
            c = right[i];
        }

        int ans[] = new int[a.length];
        for (int i = 0; i < a.length; i++) {
            int lv = 1;
            int rv = 1;
            if (i - 1 >= 0) {
                lv = left[i - 1];
            }
            if (i + 1 < a.length) {
                rv = right[i + 1];
            }
            ans[i] = lv * rv;
        }
        return ans;
    }

    public ListNode addTwoNumbers(ListNode l1, ListNode l2) {
        int carry = 0;

        ListNode ret = new ListNode(0);
        ListNode head = ret;

        while (l1 != null || l2 != null) {
            int val = 0;
            if (l1 == null) {
                val = l2.val + carry;
                l2 = l2.next;
            } else if (l2 == null) {
                val = l1.val + carry;
                l1 = l1.next;
            } else {
                val = l1.val + l2.val + carry;
                l1 = l1.next;
                l2 = l2.next;
            }

            if (val >= 10) {
                val = val % 10;
                carry = 1;
            } else {
                carry = 0;
            }
            ret.val = val;
            if(l1!=null || l2!=null || carry>0){
                ret.next = new ListNode(0);
                ret = ret.next;
            }

        }
        if (carry > 0) {
            ret.val = 1;
        }
        return head;
    }
}
