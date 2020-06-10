package com.maple.thrift;

import com.maple.thrift.open.CalculatorHandler;
import com.maple.thrift.open.CalculatorService;
import org.apache.thrift.server.TServer;
import org.apache.thrift.server.TSimpleServer;
import org.apache.thrift.transport.TServerSocket;
import org.apache.thrift.transport.TServerTransport;

/**
 * Created by 82760 on 2017/7/14.
 */
public class BootStrap {
    private static int port = 9090;
    private static CalculatorHandler handler;
    private static CalculatorService.Processor processor;
    /**
     * 启动服务器
     * @param processor
     */
    public static void start(CalculatorService.Processor processor){
        try {
            TServerTransport serverTransport = new TServerSocket(port);
            TServer.AbstractServerArgs args = new TServer.Args(serverTransport);
            args.processor(processor);

            TServer server = new TSimpleServer(args);
            // Use this for a multithreaded server
            // TServer server = new TThreadPoolServer(new TThreadPoolServer.Args(serverTransport).processor(processor));
            System.out.println("Starting the simple server...");
            server.serve();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
    public static void main(String[] args) {
        handler = new CalculatorHandler();
        processor = new CalculatorService.Processor(handler);
        start(processor);
    }
}
