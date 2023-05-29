<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Cek Kondisi
        if (Auth::id()) {

            $posts = Post::all();
            $users = User::all();
            $usertype=Auth()->user()->usertype;

            // Jika login sebagai user maka tampilkan halaman dashboard
            if ($usertype=='user') {
                return view('home.homepage', compact('posts'));
            }
            // Jika login sebagai admin maka tampilkan halaman home
            else if ($usertype=='admin') {
                $posts = Post::all();
                $users = User::all();
                return view('admin.adminhome', compact('posts','users'));
            }

            // Selain itu kembali
            else {
                return redirect()->back();
            }
        }
    }

    public function homepage()
    {
        $posts = Post::all();
        return view('home.homepage', compact('posts'));
    }
}
