
fun main(args:Array<String>){
//    println("hello world")
    println("hello world")
    println(sum(1,3))
    printArgs(1,2,3,4,5)
    var x = 1
    print(x+1)
    var s = "string world"
    s+="nihaoma"
    println(s)
}

fun sum(a : Int , b : Int) = a+b

fun printArgs(vararg args:Int){
    for( i in args){
        println(i)
        print("hello world"+"world"+"\n")
    }
}