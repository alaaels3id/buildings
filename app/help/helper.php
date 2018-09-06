<?php
use App\Admin;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

function GetSettings($site_name = 'sitename')
{
    return App\Setting::where('name', $site_name)->get()->first()->value;
}

function contacts(){
    $array = [
        'like'    => 'like',
        'Problem' => 'Problem',
        'Suggest' => 'Suggest',
        'Support' => 'Support',
    ];
    return $array;
}

function coview(){
    $array = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];
    return $array;
}

function rooms()
{
    $array = [];
    for ($i=2; $i <= 20; $i++) { 
        $array [$i] = $i;
    }
    return $array;
}

function GetImage($image, $path = '/public/one/uploads/', $url = '/one/uploads/')
{
    $root = Request::root(); 
    $path = base_path().$path.$image;
    if($image != ''):
        if(file_exists($path)):
            return $root.$url .$image;
        endif;
    else:
        return $root.$url.GetSettings('no_image');
    endif;
}

function uploadimage($request, $path = '/public/one/uploads/', $width='750', $height='750', $DeleteFileWithName = '')
{
    $dim = getimagesize($request);

    if($DeleteFileWithName != ''){
        delete(base_path().$path.'/'.$DeleteFileWithName);
    }

    $random = rand(1000, 9999);
    
    $filename = $random.'_'.$request->getClientOriginalName();
    $request->move(base_path().$path, $filename);

    if($width == '750' && $height == '750'){
        Image::make(base_path().$path.'/'.$filename)->resize('750', '750')->save();
    }

    return $filename;
}

function delete($DeleteFileWithName){
    if(file_exists($DeleteFileWithName)){
        File::delete($DeleteFileWithName);
    }
}

function gov()
{
    $arr = [
        'New Valley'     => 'New Valley',
        'Matruh'         => 'Matruh',
        'Red Sea'        => 'Red Sea',
        'Giza'           => 'Giza',
        'South Sinai'    => 'South Sinai',
        'North Sinai'    => 'North Sinai',
        'Suez'           => 'Suez',
        'Beheira'        => 'Beheira',
        'Helwan'         => 'Helwan',
        'Sharqia'        => 'Sharqia',
        'Dakahlia'       => 'Dakahlia',
        'Kafr el-Sheikh' => 'Kafr el-Sheikh',
        'Alexandria'     => 'Alexandria',
        'Monufia'        => 'Monufia',
        'Minya'          => 'Minya',
        'Gharbia'        => 'Gharbia',
        'Faiyum'         => 'Faiyum',
        'Qena'           => 'Qena',
        'Asyut'          => 'Asyut',
        'Sohag'          => 'Sohag',
        'Ismailia'       => 'Ismailia',
        'Beni Suef'      => 'Beni Suef',
        'Qalyubia'       => 'Qalyubia',
        'Aswan'          => 'Aswan',
        'Damietta'       => 'Damietta',
        'Cairo'          => 'Cairo',
        'Port Said'      => 'Port Said',
        'Luxor'          => 'Luxor',
        '6th of October' => '6th of October',
    ];
    return $arr;
}

function type()
{
    $array = [
        'Apartment'     => 'Apartment',
        'Villa'         => 'Villa',
        'Shallih'        => 'Shallih'
    ];
    return $array;
}

function rent()
{
    $array = [
        'No' => 'No',
        'Yes' => 'Yes'
    ];
    return $array;
}

function status(){
    return ['Active' => 'Active','Disactive' => 'Disactive'];
}

//==================================================================================
//========= contact us functions  ==================================================

function getUnreadedMessagesCount(){
    return App\ContactUs::where('co_view', 'No')->get()->count();
}
function getUnreadedMessages(){
    return App\ContactUs::where('co_view', 'No')->get();
}
function getreadedMessagesCount(){
    return App\ContactUs::where('co_view', 'Yes')->get()->count();
}
function getAllMessagesCount(){
    return App\ContactUs::count();
}
//==================================================================================

function getUserBuildingsCount($id, $table, $param){
    $count = DB::table($table)->where($param, $id)->count();
    return ($count != null) ? $count : 0;
}

function getAllBuildingsCount(){
    return App\Buliding::count();
}

function getUserBuildingsStatusCount($id, $status){
    $res = DB::table('buliding_user')
    ->leftjoin('bulidings', 'bulidings.id', '=', 'buliding_user.buliding_id')
    ->select('bulidings.*')->where('buliding_user.user_id', $id)
    ->where('bulidings.bu_status', $status)->groupBy('id')->get()->count();
    return $res != null ? $res : 0 ;
}

function getUserBu($id, $status){
    return DB::table('buliding_user')
    ->leftjoin('bulidings', 'bulidings.id', '=', 'buliding_user.buliding_id')
    ->select('bulidings.*')->where('buliding_user.user_id', $id)
    ->where('bulidings.bu_status', $status)->groupBy('id')->paginate(9);
}

function SetActive($array, $class = 'active-link'){
    return Request::is($array) ? $class : null;
}

function getBuildingsStatusCount($status){
    return App\Buliding::where('bu_status', $status)->get()->count();
}

function MyOrders($id){
    return App\Order::where('user_id', intval($id))->get()->count();
}

function GetBuById($id){ return App\Buliding::find(intval($id)); }

function GetMoney($price){ return cknow\Money\Money::EGP($price)->format();}

function SetImage($img, $path){
    return GetImage($img, '/public/one/uploads/'.$path.'/', '/one/uploads/'.$path.'/');
}

function GetPaginate($page){
    $links = $page->appends(Request::except('page'))->render();
    return ($links != '') ? "<div class='text-center'>".$page->appends(Request::except('page'))->render()."</div>" : '';
}

function GetChart($charts){
    // Make sure that the is null or not if the month is null give it 0 value;
    $ar = [];

    $months = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0, 12 => 0];
    
    if(isset($charts)){ for($i = 0; $i < count($charts); $i++) { $ar[] = $charts[$i]['month']; } }
    
    $diff = array_diff($months, $ar);

    $dif = [];
    foreach ($diff as $key => $val) { $dif[$key] = $key; }
    foreach ($charts as $chart){ if(array_key_exists($chart['month'], $dif)) { $months[$chart['month']] = $chart['count']; } }

    return $months;
}

function SetUploadedFile($request, $user)
{
    $file = $request->file('user_image');
    $data = array_except($request->all(), ['user_image']);
    
    if($file):
        $filename = uploadimage($file, '/public/one/uploads/users/', '750', '750', $user->user_image);
        if(!$filename):
            return back()->withFlashMessage('Please Choose another image that has a size (750x750) !!');
        endif;
        $user->update(['user_image' => $filename]);
    else:
        $user->update($data);
    endif;
}