<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

class HomeController extends Controller
{
    function index() {
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('home', ['posts' => $posts,
    'title'=> 'Artigos e Noticias']);
    }


    function full_post(Request $request, $slug, $post_id){
        $post = Post::find($post_id);
        return view('full', ['post'=> $post]);
    }

    //ALl cats
    function all_categories(){
        $categories = Category::orderBy('id', 'desc')->get();
        return view('categories', ['categories'=>$categories]);
    }
    //post by category
    function category(Request $request, $cat_slug, $cat_id){
        $category = Category::find($cat_id);
        $posts = Post::where('cat_id', $cat_id)->orderBy('id', 'desc')->paginate(5);
        return view('category', ['posts'=> $posts, 'category' => $category]);
    }


    function save_comment(Request $request, $slug, $id){
        $request->validate([
            'comment'=>'required'
        ]);

        $data = new Comment;
        $data->user_id=$request->user()->id;
        $data->post_id=$id;
        $data->comment=$request->comment;
        $data->save();

        return redirect('post/' . $slug . '/' . $id)->with('success','comment has been submited');

    }

    //User submit post
    function save_post_form(){
        $cats = Category::all();
        return view('save-post-form', ['cats'=>$cats]);
    }

    function save_post_data(Request $request){
        //
        $request -> validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required'
        ]);

        //post thumbnail
        if($request->hasFile('thumb')){
            $image1=$request->file('thumb');
            $reThumbImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/imgs/thumb');
            $image1->move($dest1,$reThumbImage);
        }else{
            $reThumbImage='na';
        }

        //post full image
        if($request->hasFile('full_img')){
            $image2=$request->file('full_img');
            $reFullImage=time().'.'.$image2->getClientOriginalExtension();
            $dest2=public_path('/imgs');
            $image2->move($dest2,$reFullImage);
        }else{
            $reFullImage='na';
        }

        $post=new Post;
        $post->user_id=$request->user()->id;
        $post->cat_id=$request->category;  
        $post->title=$request->title;
        $post->content=$request->content;
        $post->tags=$request->tags;
        $post->thumb=$reThumbImage;
        $post->full_img=$reFullImage;
        $post->status=1;
        $post->save();

        return redirect('save-post-form')->with('success','Post added'); 
    }


}
