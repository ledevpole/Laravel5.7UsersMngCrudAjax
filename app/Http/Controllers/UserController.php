<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        switch ($request->user()->admin ) {
            case 0:
                return view('home');
                break;

            case 1:
                $users['users'] = \App\User::all();
                if ($request->user()->isGodBlessed) {
                    return view('users.godlook',$users);
                }
            return view('adminhome',$users);
                break;

            default:
                return view('landing');
                break;
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {  if ($request->user()->isGodBlessed) {
           return view('users.create');
       }return redirect('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if ($request->user()->isGodBlessed) {

            if ((int) $request['isGodBlessed']) {
                $request['admin'] = 1;
            }

            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'admin' => (int) $request['admin'],
                'isGodBlessed' =>  (int) $request['isGodBlessed']
            ]);

        }
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->user()->isGodBlessed) {

            $user['user'] = \App\User::where('id', $id)->get();

        return view('users.show', $user);
        }
        return redirect('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->user()->isGodBlessed) {

            $user = User::find($id);
            return view('users.edit', compact('user','id'));
        }
        return redirect('home');
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
        if ($request->user()->isGodBlessed) {

            $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'confirmed',
            ]);

            $user = User::find($id);

            if ((int) $request['isGodBlessed']) {
                $request['admin'] = 1;
            }

            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->password != "") {
                $user->password = Hash::make($request->password);
            }
            $user->admin = (int) $request->admin;
            $user->isGodBlessed = (int) $request->isGodBlessed;
            $user->save();

            return redirect('home')->with('success','L\' utilisateur a bien été modifié!');

            
        }
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->user()->isGodBlessed) {

            $user = User::find($id);
            $user->delete();

            return redirect('home')->with('success','L\' utilisateur a bien été supprimé!');
        }
        return redirect('home');
    }
}
