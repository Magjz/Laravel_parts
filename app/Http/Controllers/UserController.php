<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Auth;


class UserController extends Controller
{

    public function index()
    {
        $id = Auth::user()->id;
        $user = User::show($id);
        return view('Compte.Index')->with(['user' => $user]);
    }

    public function update()
    {
        $id = Auth::user()->id;
        DB::table('users')->where('id', '=', $id)
        ->update(['name' => request('name'), 
                  'email'=> request('email')
                 ]);
        return back();
    }

    public function delete()
    {
        $id = Auth::user()->id;
        DB::table('users')->where('id', '=', $id)->delete();
        return redirect()->route("home");
    }
}
