<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRequest;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        
        // Cek Kondisi
        if (Auth::id()) {

            // Search
            $katakunci = $request->katakunci;
            if (strlen($katakunci)) {
                $posts = Post::where('title', 'like', "%$katakunci%")->paginate(5);
            } else {
                $posts = Post::orderBy('name', 'asc')->paginate(4);
            }
            
            $users = Post::paginate(4);
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

    public function createPost()
    {
        return view('home.create_post');
    }

    public function store(CreateRequest $request)
    {
        // Mengambil data user yang login
        $user = Auth()->user();
        $userid = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;

        // Menyimpan data
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'pending';
        $post->user_id = $userid;
        $post->name = $name;
        $post->usertype = $usertype;

        // Uploud image
        $image = $request->image;
        if ($image) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }
    
        $post->save();

        Alert::success('Success', 'Post Created Successfully');
        return redirect()->route('home');
    }

    public function postDetail($id)
    {
        $post = Post::find($id);
        return view('home.post_detail', compact('post'));
    }
}
