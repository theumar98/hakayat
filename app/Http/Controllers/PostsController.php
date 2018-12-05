<?php

namespace App\Http\Controllers;


use App\Models\Posts;
use App\Models\Categories;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Posts::all();
       // dd($data->Category->toArray());
        return view('posts/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_names = Categories::all(['id','name']);
       //dd($data->toArray());
        return view('posts/add' , compact('category_names'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  dd($request->toArray());

        $posts_uuid = Uuid::generate()->string;
        $user_id = Auth::User()->id;

        $posts = Posts::create([
            'uuid' => $posts_uuid,
            'user_id' => $user_id,
            'category_id' => $request['category'],
            'title' => $request['title'],
            'content' => $request['content'],
        ]);
        $posts->save();

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = Posts::find($id);
       // dd($data->toArray());
        return view('posts/detail',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category_names'] = Categories::all(['id','name']);
        $data['post'] = Posts::find($id);
       // dd($data['post']);
        return view('posts/edit',compact('data'));
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
        $post = Posts::find($id);
        $post->title = $request->get('title');
        $post->category_id = $request->get('category');
        $post->content = $request->get('content');
        $post->save();

        return redirect('posts/detail/'.$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
