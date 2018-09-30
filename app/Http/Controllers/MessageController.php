<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ( $request->user()->admin === 1) {
            $messages = new Message();
            $messages = $messages->all();    
            return view('messages.index',compact('messages'));
        }  

        return view('/landing');      
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new Message();
        $message->content = $request->content;
        $message->save();
        
        return redirect('messages/create')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ( $request->user()->admin === 1) {
            $message = Message::find($id);
            return view('messages/show',compact('message'));
        }
        return view('/landing');   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ( $request->user()->admin === 1) {
            $message = Message::find($id);
            return view('messages/edit',compact('message','id'));
        }
        return view('/landing');   
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
        if ( $request->user()->admin === 1) {
            $message = Message::find($id);
            $message->content = $request->content;
            $message->save();

            return redirect('messages')->with('success','Information has been updated');
        }
        return view('/landing');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ( $request->user()->admin === 1) {
            $message = Message::find($id);
            $message->delete();
            return redirect('messages')->with('success','Information has been  deleted');
        }
        return view('/landing');
    }
}