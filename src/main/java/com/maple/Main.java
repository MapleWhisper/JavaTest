package com.maple;

import com.alibaba.fastjson.JSON;
import com.maple.algorithm.ListNode;
import com.maple.algorithm.TreeNode;
import com.maple.servlet.HelloServlet;
import net.sf.cglib.proxy.Enhancer;
import net.sf.cglib.proxy.MethodInterceptor;
import net.sf.cglib.proxy.MethodProxy;

import java.lang.reflect.InvocationHandler;
import java.lang.reflect.Method;
import java.lang.reflect.Proxy;
import java.util.*;
import java.util.concurrent.*;

public class Main {

    public static Scanner scan = new Scanner(System.in);

    public interface IHello {
        void hello();
    }

    static class Hello implements IHello {
        @Override
        public void hello() {
            System.out.println("hello world");
        }
    }

    static class HelloInvocationHandler implements InvocationHandler {

        private final Object target;

        public HelloInvocationHandler(Object target) {
            this.target = target;
        }

        @Override
        public Object invoke(Object proxy, Method method, Object[] args) throws Throwable {
            System.out.println("before hello");
            Object obj = method.invoke(target, args);
            System.out.println("after hello");
            return obj;
        }
    }

    public static void main(String[] args) {

        //        Hello hello = new Hello();
        //        IHello helloProxy = (IHello) Proxy.newProxyInstance(IHello.class.getClassLoader(), hello.getClass().getInterfaces(),
        //                new HelloInvocationHandler(hello));
        //        helloProxy.hello();

        //        Enhancer enhancer = new Enhancer();
        //        enhancer.setSuperclass(hello.getClass());
        //        enhancer.setCallback(new MethodInterceptor() {
        //            @Override
        //            public Object intercept(Object o, Method method, Object[] objects, MethodProxy methodProxy)
        //                    throws Throwable {
        //                System.out.println("pre Hello");
        //                methodProxy.invokeSuper(o,objects);
        //                System.out.println("after hello");
        //                return null;
        //            }
        //        });
        //        hello = (Hello) enhancer.create();
        //        hello.hello();
        //
        //        FutureTask future = new FutureTask(new Callable() {
        //            @Override
        //            public Object call() throws Exception {
        //                Thread.sleep(2000);
        //                return null;
        //            }
        //        });
        //
        //        ExecutorService executorService = Executors.newSingleThreadExecutor();
        //        executorService.execute(future);
        //
        //        try {
        //            future.get(2001,TimeUnit.MILLISECONDS);
        //        } catch (Exception e){
        //            e.printStackTrace();
        //        }
        //        executorService.shutdownNow();
        //        System.out.println("execute ok");

        //        PriorityQueue<Integer> priorityQueue = new PriorityQueue<Integer>();
        //        priorityQueue.add(3);
        //        priorityQueue.add(2);
        //        priorityQueue.add(1);
        //        System.out.println(priorityQueue.poll());

//        Main main = new Main();
//        Arrays.fill(main.v, 0);
//        main.dfs(1);

        TreeNode treeNode = new TreeNode(1);
        treeNode.left = new TreeNode(2);
        treeNode.right = new TreeNode(3);
        treeNode.right.left = new TreeNode(4);
        treeNode.right.right = new TreeNode(5);
//
//        findTrace(treeNode,9,new LinkedList<>());
//
//        int a[] = new int[10];
//        for(int i=0;i<101;i++){
//            addOne(a);
//            System.out.println(JSON.toJSONString(a));

//        }
        LinkedList<TreeNode> list = new LinkedList();
        list.addLast(treeNode);
        list.addLast(new TreeNode(-1));
        printList(list);

        String s = "192.168.001.001";

    }

    public static void printList(LinkedList<TreeNode> list){
        while (list.size()!=1){
            TreeNode node = list.removeFirst();
            if(node.val==-1){
                list.addLast(new TreeNode(-1));
                System.out.println();
            }else{
                System.out.print(node.val+" ");
                if(node.left!=null){
                    list.addLast(node.left);
                }
                if(node.right!=null){
                    list.addLast(node.right);
                }
            }
        }
    }

    public static void addOne(int a[]){
        int idx = a.length;
        int carry = 1;
        do{
            idx--;
            a[idx]+=1;
            carry = a[idx]/10;
            a[idx]%=10;
        }while (idx>0 && carry>0);
    }

    public static void findTrace(TreeNode node, int target, LinkedList<Integer> stack){
        if(node == null){
            return ;
        }
        stack.addLast(node.val);
        if(node.left == null && node.right == null){
            if(target == node.val){
                for(int i : stack){
                    System.out.print(i+" ");

                }
                System.out.println();
            }
            return;
        }
        findTrace(node.left,target-node.val,stack);
        stack.removeLast();
        findTrace(node.right,target-node.val,stack);
        stack.removeLast();



    }

    public int a[] = new int[100];
    public int v[] = new int[100];
    public int n   = 3;

    public void dfs(int step) {
        for (int i = 1; i <= n; i++) {
            if (v[i] == 0) {
                v[i] = 1;
                a[step] = i;
                if (step < n) {
                    dfs(step + 1);
                } else {
                    for (int j = 1; j <= n; j++) {
                        System.out.print(a[j] + " ");
                    }
                    System.out.println();
                }
                v[i] = 0;
            }
        }
    }

}