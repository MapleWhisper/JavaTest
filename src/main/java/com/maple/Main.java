package com.maple;


public class Main {


    static int w[] ={5,6,4};
    static int v[] = {20,10,12};

    public static void findAns(int a[][] , int i , int j){

        if(i==0){
            if(a[i][j]!=0){
                System.out.println(w[i]+"\t"+v[i]);
            }
            return ;
        }
        if(a[i][j]!=a[i-1][j]){
            // 放进来了
            System.out.println(w[i]+"\t"+v[i]);
            findAns(a,i-1,j-w[i]);
        }else{
            findAns(a,i-1,j);
        }




    }

    public static void main(String[] args){

        int n =3;
        int size =10;


        int a[][] = new int[n][size+1];

        for(int i=0;i<n;i++){
            for(int j=1;j<=size;j++){
                if(j>=w[i]){
                    if(i==0){
                        a[i][j] = v[i];
                    }else{
                        a[i][j] = Math.max(a[i-1][j],a[i-1][j-w[i]]+v[i]);
                    }

                }else{
                    if(i==0){
                        a[i][j]=0;
                    }else{
                        a[i][j] = a[i-1][j];
                    }
                }
            }
        }
        for(int i=0;i<n;i++){
            for(int j=0;j<=size;j++){
                System.out.printf(a[i][j]+"\t");
            }
            System.out.println();
        }


        findAns(a,n-1,size);


    }
}
