<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Buliding;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('home');
    }
    
    public function profile($user)
    {
        $ids = DB::table('buliding_user')->where('user_id', auth()->user()->id)->get();

        $bu_ids = [];

        foreach($ids as $key => $value){ $bu_ids[$key] = $value->buliding_id; }

        $mybuildings = DB::table('bulidings')->whereIn('id', $bu_ids)->paginate(9);

        if(!empty($mybuildings)){
            return view('pages.profile', compact('mybuildings'));
        }
    }

    public function getajaxinformation(Request $request)
    {
        $res = Buliding::find(intval($request->id))->toJson();
        return (!empty($res)) ? $res : 'ERROR: RESAULT IS UNKNOWN.';
    }
}
