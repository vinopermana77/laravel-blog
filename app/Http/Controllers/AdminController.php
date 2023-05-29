<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRequest;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.post_page');
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

        return redirect()->route('show_posts')->with('message', 'Post Created Successfully');
    }

    public function show_posts()
    {
        $posts = Post::all();
        return view('admin.show_posts', compact('posts'));
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('message', 'Post Deleted Successfully');
    }
}
