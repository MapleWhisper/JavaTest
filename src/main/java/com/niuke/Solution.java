package com.niuke;


import java.util.*;

class TreeNode {
    int val = 0;
    TreeNode left = null;
    TreeNode right = null;

    public TreeNode(int val) {
        this.val = val;

    }

}
 class ListNode {
    int val;
    ListNode next = null;

    ListNode(int val) {
        this.val = val;
    }
}

public class Solution {

    Stack<Integer> stack1 = new Stack<Integer>();
    Stack<Integer> stack2 = new Stack<Integer>();

    public static void main(String[] args) {
        Solution solution = new Solution();

        int a[][] = {{1,2,3,4},{5,6,7,8},{9,10,11,12},{13,14,15,16}};
        solution.printMatrix(a);

    }

    public String replaceSpace(StringBuffer str) {

        String s = str.toString();
        String ans = s.replaceAll(" ", "%20");
        System.out.println(ans);
        return ans;
    }

    public boolean Find(int target, int[][] array) {
        if (array == null || array.length == 0 || array[0].length == 0) {
            return false;
        }
        int rtop = 0, rbuttom = array.length - 1;
        int cleft = 0, cright = array[0].length - 1;

        while (rtop < rbuttom || cleft < cright) {
            if (array[rbuttom][cleft] > target) {
                rbuttom--;
            } else if (array[rbuttom][cleft] < target) {
                cleft++;
            } else {
                return true;
            }

            if (array[rtop][cright] > target) {
                cright--;
            } else if (array[rtop][cright] < target) {
                rtop++;
            } else {
                return true;
            }

        }
        return target == array[rtop][cleft];
    }


    public void Mirror(TreeNode root) {

        if (root == null) {
            return;
        }
        if (root.left == null && root.right == null) {
            return;
        }
        TreeNode tmp;
        tmp = root.left;
        root.left = root.right;
        root.right = tmp;

        Mirror(root.left);
        Mirror(root.right);

    }

    public int Add(int a, int b) {
        int sum = 0;
        int d = 0;
        do {
            sum = a ^ b;
            d = (a & b) << 1;
            a = sum;
            b = d;
        } while (b != 0);
        return sum;

    }

    public StringBuilder fixLengthBins(StringBuilder bins)

    {

        int len = bins.length();

        for (int i = 0; i < 64 - len; i++)

        {

            bins.insert(0, '0');

        }

        return bins;

    }

    public int Add1(int a, int b) {

        StringBuilder ah = new StringBuilder(Integer.toBinaryString(a));
        StringBuilder bh = new StringBuilder(Integer.toBinaryString(b));
        StringBuilder ans = new StringBuilder(Integer.toBinaryString(0));
        fixLengthBins(ah);
        fixLengthBins(bh);
        fixLengthBins(ans);
//        System.out.println(ah.toString());
//        System.out.println(bh.toString());
        int carry = 0;
        for (int i = 63; i >= 0; i--) {

            if (ah.charAt(i) == bh.charAt(i)) {
                if (ah.charAt(i) == '0') {
                    if (carry == 0) {
                        ans.setCharAt(i, '0');
                    } else {
                        ans.setCharAt(i, '1');
                        carry = 0;
                    }

                } else {
                    if (carry == 0) {
                        ans.setCharAt(i, '0');

                    } else {
                        ans.setCharAt(i, '1');
                    }
                    carry = 1;
                }
            } else {
                if (carry == 0) {
                    ans.setCharAt(i, '1');
                } else {
                    ans.setCharAt(i, '0');
                    carry = 1;
                }

            }
        }
        if (carry == 1) {
            ans.insert(0, '1');
        }
//        System.out.println(ans.toString());

        return Integer.parseInt(ans.toString(), 2);

    }


//    public void push(int node) {
//        stack1.push(node);
//    }
//
//    public int pop() {
//        if (stack1.size() == 0) {
//            return 0;
//        } else {
//            while (stack1.size()>1){
//                stack2.push(stack1.pop());
//            }
//            int ans = stack1.pop();
//            while ((stack2.size()>0)){
//                stack1.push(stack2.pop());
//            }
//            return ans;
//        }
//    }
    // 例如数组{3,4,5,1,2}为{1,2,3,4,5}的一个旋转
    public int minNumberInRotateArray(int [] array) {
        if(array== null || array.length==0){
            return 0;
        }
        if(array.length==1){
            return array[0];
        }
        return doMinNumberInRotateArray(array,0,array.length-1);
    }

    private int doMinNumberInRotateArray(int[] array, int left, int right) {
        if(right==left+1){
            return array[right];
        }
        int mid = (left+right)/2;
        if(array[mid]>array[right]){
            left = mid;
        }else{
            right = mid;
        }
        return doMinNumberInRotateArray(array,left,right);
    }

    public ListNode ReverseList(ListNode head) {
//        if(head==null || head.next==null){
//            return head;
//        }
//        ListNode newHead = null;
//        ListNode p = head;
//        while(p!=null){
//            ListNode tmp = p.next;
//            p.next = newHead;
//            newHead = p;
//            p = tmp;
//        }
//        return newHead;
        if(head==null || head.next==null){
            return head;
        }
        ListNode newHead = ReverseList(head.next);
        head.next.next = head;
        head.next = null;

        return newHead;
    }

    public ListNode Merge(ListNode list1,ListNode list2) {
        ListNode head = new ListNode(0);
        ListNode p = head;

        while(list1!=null && list2!=null){
            ListNode newNode;
            if(list1.val<list2.val){
                newNode = new ListNode(list1.val);
                list1 = list1.next;
            } else{
                newNode = new ListNode(list2.val);
                list2 = list2.next;
            }
            newNode.next = null;
            p.next = newNode;
            p = newNode;
        }

        ListNode newNode;
        while (list1!=null){
            newNode = new ListNode(list1.val);
            list1 = list1.next;
            p.next = newNode;
            p = newNode;
        }
        while (list2!=null){
            newNode = new ListNode(list2.val);
            list2 = list2.next;
            p.next = newNode;
            p = newNode;
        }
        return head.next;
    }

    public ArrayList<Integer> PrintFromTopToBottom(TreeNode root) {
        if(root==null){
            return new ArrayList<>();
        }
        ArrayList<Integer> ansList = new ArrayList();
        LinkedList<TreeNode> quene = new LinkedList();
        quene.add(root);
        while(quene.size()>0){
            TreeNode node = quene.pop();
            ansList.add(node.val);
            if(node.left!=null){
                quene.add(node.left);
            }
            if(node.right!=null){
                quene.add(node.right);
            }
        }
        return ansList;
    }

    public boolean IsPopOrder(int [] pushA,int [] popA) {

        LinkedList<Integer> stack = new LinkedList<>();
        LinkedList<Integer> list1 = new LinkedList<>();
        for (int i = 0 ;i < pushA.length; i++){
            list1.addLast(pushA[i]);
        }
        LinkedList<Integer> list2 = new LinkedList<>();
        for (int i = 0 ;i < popA.length; i++){
            list2.addLast(popA[i]);
        }

        while ( !list2.isEmpty() ){
            while (stack.isEmpty() || !stack.peekLast().equals(list2.peekFirst())){
                if(list1.isEmpty()){
                    break;
                }
                stack.addLast(list1.removeFirst());
//                System.out.println(Arrays.toString(stack.toArray()));
            }
            if(stack.peekLast().equals(list2.peekFirst())){
                stack.removeLast();
                list2.removeFirst();
            }else{
                break;
            }

        }
//        System.out.println(Arrays.toString(stack.toArray()));
//        System.out.println(Arrays.toString(list1.toArray()));
//        System.out.println(Arrays.toString(list2.toArray()));
//        System.out.println(stack.size() +"\t"+ list1.size() + "\t"+ list2.size());
        return stack.isEmpty();
    }

    private LinkedList<Integer> stackWithMinFunc = new LinkedList<>();
    private LinkedList<Integer> minStack = new LinkedList<>();
    public void push(int node) {
        stackWithMinFunc.addLast(node);
        if(minStack.isEmpty()){
            minStack.addLast(node);
        }else if(node < minStack.peekLast()){
            minStack.addLast(node);
        }else{
            minStack.addLast(minStack.peekLast());
        }
    }

    public void pop() {
        if(!stackWithMinFunc.isEmpty()){
            stackWithMinFunc.removeLast();
            minStack.removeLast();
        }

    }

    public int top() {
        if(stackWithMinFunc.isEmpty()){
            return 0;
        }
        return stackWithMinFunc.peekLast();
    }

    public int min() {
        if(minStack.isEmpty()){
            return 0;
        }
        return minStack.peekLast();
    }

    public ArrayList<Integer> printMatrix(int [][] matrix) {

        ArrayList ans = new ArrayList();
        if(matrix==null){
            return ans;
        }

        int x = 1;
        int y = 0;
        int rowCnt = matrix.length;
        int colCnt = matrix[0].length;

        int sum = rowCnt*colCnt;
        int cnt =0;

        int i = 0 , j= 0;
        while(cnt<sum){
            while (j<colCnt && j>=0 && matrix[i][j]!=-1){

                ans.add(matrix[i][j]);
                matrix[i][j]=-1;
                cnt++;
                j++;
            }
            j--;
            i++;
            while (i<rowCnt && i>=0 && matrix[i][j]!=-1){

                ans.add(matrix[i][j]);
                matrix[i][j]=-1;
                cnt++;
                i++;
            }
            i--;
            j--;
            while (j<colCnt && j>=0 && matrix[i][j]!=-1){
                ans.add(matrix[i][j]);
                matrix[i][j]=-1;
                cnt++;
                j--;
            }
            j++;
            i--;
            while (i<rowCnt && i>=0 && matrix[i][j]!=-1){

                ans.add(matrix[i][j]);
                matrix[i][j]=-1;
                cnt++;
                i--;
            }
            i++;
            j++;
        }
//        System.out.println(Arrays.toString(ans.toArray()));
        return ans;
    }

}
