<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRequest;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        if (strlen($katakunci)) {
            $posts = Post::where('title', 'like', "%$katakunci%")
            ->orWhere('name', 'like', "%$katakunci%")
            ->paginate(5);
        } else {
            $posts = Post::paginate(5);
        }
        return view('admin.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create_post');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('home.post_detail', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('admin.edit_post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

        $post->update();

        Alert::success('Success', 'Post Updated Successfully');
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        
        Alert::success('Success', 'Post Deleted Successfully');
        return redirect()->back();
    }

    public function acceptPost($id)
    {
        $post = Post::find($id);
        $post->post_status = 'active';
        $post->save();

        Alert::success('Success', 'Post Accepted');
        return redirect()->back()->with('active','Post Active');
    }

    public function rejectPost($id)
    {
        $post = Post::find($id);
        $post->post_status = 'rejected';
        $post->save();

        Alert::success('Success', 'Post Rejected');
        return redirect()->back()->with('rejected','Post Rejected');
    }
}
