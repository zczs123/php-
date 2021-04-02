<?php
class Student
{
    const TITLE="<h2>PHP追赠好学</h2>";
    //私有的静态属性
    private static $count = 60;
    //私有的成员属性
    private $name= "张三";
    private $age = 23;
    //公有的成员办法
    public function readME()
    {
        echo __METHOD__;
    }
}
//创建学生类对象
var_dump($obj);