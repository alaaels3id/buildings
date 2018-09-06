<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Buliding;
use App\ContactUs;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {    	
        // Get Users Count
        $UsersCount = User::count();

        // Get Top Adder Members
        $usersBuildingsCount = DB::table('buliding_user')
        ->leftjoin('users', 'buliding_user.user_id', '=', 'users.id')
        ->select('users.name', 'users.user_image', 'users.id', DB::raw('COUNT(buliding_user.user_id) as count'))
        ->havingRaw('count >= 3')->groupBy('id')->get();
        

        // Get latitude and logtude of the buildings
        $maps = Buliding::select('bu_latitude', 'bu_langtude', 'bu_name')->get();
        
        // Get the last added Users (8);
        $leatestUsers = User::take(8)->latest()->get();
        
        // Get the last added Buldings (8);
        $leatestBuildings = Buliding::take(8)->latest()->get();
        
        // Get the charts of the current year of buildings
        $charts = Buliding::select(DB::raw('COUNT(*) as count, month(created_at) as month, year(created_at) as year'))
        ->where('year', date('Y'))->groupBy('month')->orderBy('month', 'ASC')->get()->toArray();

        $new = GetChart($charts);

        // Make Sure that the comming request is from admin not a user;
        return view('admin.index', compact('UsersCount','maps', 'leatestUsers', 'new', 'leatestBuildings', 'usersBuildingsCount'));
    }
    
    public function AdminProfile()
    {
        // Get Current Admin Information;
        $id = Auth::user()->id;
        $user = Admin::findOrFail($id);

        $admins = DB::table('admins')
        ->leftjoin('admin_buliding', 'admin_buliding.admin_id', '=', 'admins.id')
        ->leftjoin('bulidings', 'admin_buliding.buliding_id', '=', 'bulidings.id')
        ->select('bulidings.*', 'admins.name', 'admins.user_image')
        ->groupBy('id')->get();
            
        // Return a profile page with (user, admins) arrays;
        return view('admin.pages.profile', compact('user', 'admins'));
    }

    public function update(Request $request, $id)
    {
        $user = Admin::find(intval($id));
        SetUploadedFile($request, $user);
        return back()->withFlashMessage('Done Operation !!');
    }

    // public function ViewBuStatistics()
    // {
    //     // Get the charts of the current year of buildings
    //     $charts = Buliding::select(DB::raw('COUNT(*) as count, month(created_at) as month, year(created_at) as year'))
    //             ->where('year', date('Y'))->groupBy('month')->orderBy('month', 'ASC')->get()->toArray();
        
    //     // Make sure that the is null or not if the month is null give it 0 value;
    //     $array = [];
    //     if(isset($charts[0]['month'])){
    //         for($i = 1;$i < $charts[0]['month'];$i++):
    //             $array [] = 0;
    //         endfor;
    //     }
    //     $new = array_merge($array, $charts);
    	
    //     return view('admin.inc.statistics', compact('new', 'year'));
    // }

//     public function ShowStatisticsByYear(Request $request)
//     {
//         $year = $request->year;
//         $charts = Buliding::select(DB::raw('COUNT(*) as count, month(created_at) as month, year(created_at) as year'))
//                 ->where('year', $year)->groupBy('month')->orderBy('month', 'ASC')->get()->toArray();
//         $array = [];
//         if(isset($charts[0]['month'])){
//             for($i = 1;$i<$charts[0]['month'];$i++){
//                 $array [] = 0;
//             }
//         }
//         $new = array_merge($array, $charts);
//         return view('admin.inc.statistics', compact('new', 'year'));
//     }
}
