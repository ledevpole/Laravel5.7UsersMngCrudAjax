<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function home()
    {
        return view('articles.vueApp');
    }

    public function index()
    { 
        $articles  = DB::table('articles')
            ->select(
                'articles.id',
                'articles.title',
                'articles.body',
                'users.name'   
            )
            ->join(
                'users',
                'users.id','=','articles.user_id'
            )
            ->orderBy('id','DESC')
            ->get();

        return $articles; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        ]);

        $create = $request->user()->articles()->create([

            'title' => $request->get('title'),
            'body'  => $request->get('body')
        ]);

        return response()->json(['status' => 'success','msg' => 'Article created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Article::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Article::find($id);
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
            'body' => 'required',
        ]);

        $update = Article::find($id);
        if ($update->count()) {
            $update->update([

            'title' => $request->get('title'),
            'body'  => $request->get('body'),
            'user_id' => $request->user()->id
            ]);

            return response()->json(['status' => 'success','msg' => 'Article updated successfully']);
        }else {
            return response()->json(['status' => 'error','msg' => 'Error in updating Article']);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);
        return response()->json(['status' => 'success','msg' => 'Article erased successfully']);
    }
}
