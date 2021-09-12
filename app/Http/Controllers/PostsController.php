<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PostsController
{
    public function createPost(Request $request){
        $content = $request->input('content');

        app('db')->insert("INSERT INTO posts (content) VALUES (:content)", ['name' => $content]);

    }
    public function getPostsByCategory($category){
       $id = app('db')->select("SELECT id FROM categories WHERE name = :name", ['name' => $category]);
       $posts = app('db')->select("SELECT * FROM posts WHERE category_id = :id", ['id' => $id[0]->id]);
        return response()->json($posts);
    }

    public function check($request){
        $validation = Validator::make($request->all(),[
            'content' => 'required|max:15|min:2',
            'category_id' => 'required'
        ]);
        if($validation->fails()){
            return response()->json('Please check content of post', 400);
        }
    }
}