<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Categories::all();
        return view('categories/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $user)
    {
        $categories_uuid = Uuid::generate()->string;
        //$user_id = Auth::User()->id;
        $user_id = User::find($user);
        $Categories = Categories::create([
            'uuid' => $categories_uuid,
            'user_id' => $user_id,
            'name' => $request['name'],
            'description' => $request['description'],
        ]);
        $Categories->save();

        return redirect('categories');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Categories::find($id);
        return view('categories/edit',compact('data'));
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
        $Category = Categories::find($id);
        $Category->name = $request->get('name');
        $Category->description = $request->get('description');
        $Category->save();

        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::find($id);
        $category->delete();
        return redirect('categories');
    }

    public function categoryRelatedPosts($id){
        $data = Posts::where('category_id',$id)->get();
       // dd($data->toArray());
        return view('/categories/category-related-posts',compact('data'));
    }
}
