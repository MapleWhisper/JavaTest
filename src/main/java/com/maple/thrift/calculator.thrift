 // defines the namespace
namespace java com.maple.thrift.open
service CalculatorService {
    i32 add(1:i32 num1, 2:i32 num2)
    i32 minus(1:i32 num1, 2:i32 num2)
    i32 multi(1:i32 num1, 2:i32 num2)
    i32 divi(1:i32 num1, 2:i32 num2)
    string test(1:string input)
    void ping()
}