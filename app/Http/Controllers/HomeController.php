<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
    
        $data = [
            'title' => 'Home',
            'banner' => Cms::all()
        ];
        return view('home.index', $data);
    }
}
