<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }

    public function create_post(CreateRequest $request)
    {
        // Mengambil data user yang login
        $user = Auth()->user();
        $userid = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;

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
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $newNameImage = $request->title.'.'.$imageName; // Membuat variable gambar baru
            $request->file('image')->storeAs('postImage', $newNameImage); // Tempat folder image
            $post->image = $imageName;
        }
    
        $post->save();

        return redirect()->back()->with('message', 'Post Created Successfully');
    }
}
