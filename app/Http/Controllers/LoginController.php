<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        $sitename = env('APP_NAME');
        return view('login', [
            'siteName' => $sitename,
        ]);
    }
}
