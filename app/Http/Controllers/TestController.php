<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //I/O测试1
    public function test1(): string
    {
        sleep(10);
        return '1';
    }
    
    //I/O测试2
    public function test2(): string
    {
        return '2';
    }
}
