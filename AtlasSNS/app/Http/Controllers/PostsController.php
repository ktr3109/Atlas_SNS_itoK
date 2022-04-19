<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;



class PostsController extends Controller
{
    
    public function index(){
        $post = \DB::table('posts')->get(); //$listに名前変更,データベースと連携
        return view('posts.index',['post'=>$post]); 
    
        //posts.indexに表示,listを！
    
    }

    public function create(Request $request)
    {
        $post = $request->input('post');
        $user_id = auth::id();
        \DB::table('posts')->insert([
            'user_id'=> $user_id,
            'post' => $post
        ]);
        return redirect('top');

    }

    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();
 
        return redirect('top');
    }

 //   public function updateForm($id)
 //   {
 //       $post =\DB::table('posts')
 //           ->where('id', $id)
 //           ->first();
 //       return view('posts.updateForm');
 //   }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $post = $request->input('post');
        \DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $post]);

        return redirect('top');
    }

    public function followlist(){
        return view('follows.followList');
    }
    public function followerlist(){
        return view('follows.followerList');
    }
}

