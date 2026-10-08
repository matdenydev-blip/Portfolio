<?php

namespace App\Controllers;

class HomeController extends Controller
{

    public function index()
    {
    //    $creation = new Creation();
        $this->render('home/index');
    }
}
