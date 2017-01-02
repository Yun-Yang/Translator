<?php

namespace App\Http\Controllers;

use App\document;
use Auth;
use DB;

class UserController extends Controller
{
    public function showDocument()
    {
        $id = Auth::user();

        $documents = document::with('translator1', 'translator2', 'translator3', 'translator4')->get();

        return view('user', compact('documents', 'id'));
    }

    public function cancelDocument($filename)
    {
       $document=DB::table('documents')->where('text_name',$filename)->delete();

       return redirect('/user');
    }
}
