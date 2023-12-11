<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function all_banner() {
        return response()->json([
            'success' => true,
            'data'    => Cms::all() 
        ]);
    }
}
