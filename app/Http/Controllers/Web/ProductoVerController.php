<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductoVerController extends Controller
{
        public function index()
    {
        return view('pages.ver-producto');
    }
}
