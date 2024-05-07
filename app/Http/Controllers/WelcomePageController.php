<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Builder;
class WelcomePageController extends Controller
{
    public function __invoke(){
        return view('welcome');
    }



}
