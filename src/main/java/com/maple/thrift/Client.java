package com.maple.thrift;

import com.maple.thrift.open.CalculatorService;
import org.apache.thrift.TException;
import org.apache.thrift.protocol.TBinaryProtocol;
import org.apache.thrift.protocol.TProtocol;
import org.apache.thrift.transport.TSocket;
import org.apache.thrift.transport.TTransport;
import org.apache.thrift.transport.TTransportException;

/**
 * Created by 82760 on 2017/7/14.
 */
public class Client {

    private static int port = 9090;
    private static String ip = "localhost";
    private static CalculatorService.Client client;
    private static TTransport transport;
    /**
     * 创建 TTransport
     * @return
     */
    public static TTransport createTTransport(){
        TTransport transport = new TSocket(ip, port);
        return transport;
    }
    /**
     * 开启 TTransport
     * @param transport
     * @throws TTransportException
     */
    public static void openTTransport(TTransport transport) throws TTransportException {

        if(transport == null){
            return;
        }
        transport.open();
    }
    /**
     * 关闭 TTransport
     * @param transport
     */
    public static void closeTTransport(TTransport transport){
        if(transport == null){
            return;
        }
        transport.close();
    }
    /**
     * 创建客户端
     * @return
     */
    public static CalculatorService.Client createClient(TTransport transport){
        if(transport==null){
            return null;
        }
        TProtocol protocol = new TBinaryProtocol(transport);

        CalculatorService.Client client = new CalculatorService.Client(protocol);
        return client;
    }
    public static void main(String[] args) {
        try {
            // 创建 TTransport
            transport = createTTransport();
            // 开启 TTransport
            openTTransport(transport);
            // 创建客户端
            client = createClient(transport);
            // 调用服务
            if(client == null){
                System.out.println("创建客户端失败...");
                return;
            }

            long start = System.currentTimeMillis();

            client.ping();
            int n = 100000;
            for( int i =0 ;i <n;i++){
                int w = client.add(i,i);
                //System.out.println(s);
            }
            long stop = System.currentTimeMillis();

            System.out.printf("time %d s for %d , avg %f ms\n",(stop-start)/1000L,n,(double)(stop-start)/n);


        } catch (TException e) {
            e.printStackTrace();
        }
        finally {
            // 关闭 TTransport
            closeTTransport(transport);
        }
    }
}
