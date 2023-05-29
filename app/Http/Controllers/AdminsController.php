<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRequest;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.create_post');
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
        $post->post_status = 'active';
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
        return redirect()->route('index');
    }

    public function edit(Request $id)
    {
        $post = Post::find($id);
        return view('admin.edit_post', compact('post'));
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        
        Alert::success('Success', 'Deleted Post Successfully');
        return redirect()->back();
    }
}