<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Façade\Validator;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comment = new Comment;
        $comment->content  = 'je suis un commentaire XD';
        $comment->post_id = 23;
        $comment->save(); 

        $request->session()->put('search',$request
            ->has('search') ? $request->get('search') : ($request->session()
            ->has('search') ? $request->session()->get('search') : ''));

            $request->session()->put('field',$request
            ->has('field') ? $request->get('field') : ($request->session()
            ->has('field') ? $request->session()->get('field') : 'title'));


                $request->session()->put('sort',$request
            ->has('sort') ? $request->get('sort') : ($request->session()
            ->has('sort') ? $request->session()->get('sort') : 'asc'));


        $posts = new Post();
        
        $comments = $posts->comments->all();

        $posts = $posts->where('title','like','%'.$request->session()->get('search') . '%')
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
            ->paginate(5);

        if ($request->ajax()) {
            return view('posts.index',compact('posts','comments'));
        } 
        else {
            return view('posts.ajax', compact('posts','comments'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->isMethod('get')) {
            return view('posts.form');
        }

        $rules = [
            'title' => 'required',
            'description' => 'required'
        ];

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return response()->json([
            'fail' => false,
            'redirect_url' => url('posts')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            return view('posts.detail',['post' => Post::find($id)]);
        }
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
        if($request->isMethod('get')) {
            return view('posts.form',['post' => Post::find($id)]);
        }

        $rules = [
            'title' => 'required',
            'description' => 'required'
        ];

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }

        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return response()->json([
            'fail' => false,
            'redirect_url' => url('posts')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect('posts');
    }
}
