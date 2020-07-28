<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;

use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::where('title', "post 2")->get();
        // $posts = DB::select("SELECT * FROM posts");
        //$posts =  Post::orderBy('created_at', 'desc')->get();
        //$posts =  Post::orderBy('created_at', 'desc')->take(1)->get();
        // for pagination
        $posts = Post::orderBy('created_at', 'desc')->paginate(9);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        // handle File upload
        if($request->hasFile('cover_image')){
            // Get the File name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get Only filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get Only Extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // Filename to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // image store path
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('delete', "That's Not your Post ^_^");
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);



         // handle File upload
         if($request->hasFile('cover_image')){
            // Get the File name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get Only filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get Only Extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // Filename to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // image store path
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            if($post->cover_image !== "noimage.jpg"){
                // Delete Old Image
                Storage::delete('public/cover_images/'.$post->cover_image);
            }
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('update', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('delete', "That's Not your Post ^_^");
        }

        if($post->cover_image !== "noimage.jpg"){
            // Delete
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/posts')->with('delete', 'Post Deleted Successfully');
    }
}