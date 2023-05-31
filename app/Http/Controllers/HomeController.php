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
    public function index()
    {
        // $posts = Post::paginate(4);
        // return view('home.homepage', compact('posts'));

        // Cek Kondisi
        if (Auth::id()) {

            $posts = Post::where('post_status','=','active')->paginate(4);
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
        $posts = Post::where('post_status','=','active')->paginate(4);
        return view('home.homepage', compact('posts'));
    }

    public function createPost()
    {
        return view('home.create_post');
    }

    public function userPost(CreateRequest $request)
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
        return redirect()->route('myPost');
    }

    public function postDetail($id)
    {
        $post = Post::find($id);
        return view('home.post_detail', compact('post'));
    }

    public function myPost()
    {
        $user = Auth::user();
        $userid = $user->id;
        $posts = Post::where('user_id','=',$userid)->get();
        return view('home.my_post', compact('posts'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('home.edit_post', compact('post'));
    }

    public function userUpdate(Request $request, string $id)
    {
        // Menyimpan data
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $image = $request->image;

        if ($image) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }

        $post->save();

        Alert::success('Success', 'Post Updated Successfully');
        return redirect()->route('myPost');
    }

    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        
        Alert::success('Success', 'Post Deleted Successfully');
        return redirect()->back();
    }
}
