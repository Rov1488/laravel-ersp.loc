<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.post');
    }

    public function show(Request $request, int $post_id, string $title)
    {
        dd($request);
        $post_id += 10;
        //return view('posts.post', ['post_id' => $post_id]);
        return view('posts.show')->with('post_id', $post_id)->with('title', $title);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post') && !empty($request->post())) {
            //dd(\request()->post());
            $result = $request->post();
            //return $request->json($request->post());
            return view('posts.create', ['result' => $result]);
        }
        return view('posts.create');


    }

    public function store(Request $request)
    {
        dd($request);
    }


}
