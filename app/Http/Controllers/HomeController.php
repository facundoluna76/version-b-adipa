<?php

namespace App\Http\Controllers;

use App\Data\CoursesData;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'courses'    => CoursesData::get(),
            'categories' => CoursesData::categories(),
            'navItems'   => CoursesData::navItems(),
            'stats'      => CoursesData::stats(),
        ]);
    }
}