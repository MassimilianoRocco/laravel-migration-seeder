<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        $trains=Train::all();

        $data=[
            'trains'=>$trains
        ];
        return view('home',$data);
    }
}
