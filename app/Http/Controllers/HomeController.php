<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Cek Kondisi
        if (Auth::id()) {
            $usertype=Auth()->user()->usertype;

            // Jika login sebagai user maka tampilkan halaman dashboard
            if ($usertype=='user') {
                return view('home.homepage');
            }
            // Jika login sebagai admin maka tampilkan halaman home
            else if ($usertype=='admin') {
                return view('admin.adminhome');
            }

            // Selain itu kembali
            else {
                return redirect()->back();
            }
        }
    }

    public function homepage()
    {
        return view('home.homepage');
    }
}