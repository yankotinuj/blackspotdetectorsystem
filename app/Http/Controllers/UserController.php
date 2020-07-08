<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', Auth::user()->id)->first();
        return view('user.userprofile', ['users' => $users]);
    }

    public function indexAdmin()
    {
        if (Auth::user()->username == 'admin')
        {
            $users = User::where('username', Auth::user()->username)->first();
            return view('user.userprofile', ['users' => $users]);
        }
        else
        {
            alert()->error('Anda tidak memiliki hak akses!', 'Aksi Dilarang!')->persistent("Close");
            return back();
        }
    }

    public function viewUser($username)
    {
        if (Auth::user()->username == 'admin')
        {
            $users = User::where('username', $username)->first();
            return view('user.userprofile', ['users' => $users]);
        }
        else
        {
            alert()->error('Anda tidak memiliki hak akses!', 'Aksi Dilarang!')->persistent("Close");
            return back();
        }
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
        //
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
        //
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
        //
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
