<?php

namespace App\Http\Controllers;

class ErrorController extends Controller
{
    public function index()
    {
        return view('components.error-403');
    }
}
