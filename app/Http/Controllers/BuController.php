<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Http\Requests\BuRequest;
use App\Buliding;
use App\Order;
use App\User;
use Auth;
use Html;
use DB;

class BuController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id !== null ? '?user_id='.$request->id : null;

        return view('admin.buildings.index', compact('id'));
    }
    
    public function create()
    {
        return view('admin.buildings.add');
    }
    
    public function store(BuRequest $request)
    {
        //dd($request->all());
        if($request->file('bu_image')){
            $filename = uploadimage($request->file('bu_image'));
            if(!$filename){
                return back()->withFlashMessage('Please Choose another image that has a size (750x750) !!');
            }
            $image = $filename;
        }else{
            $image = '';
        }
        $Buliding = Buliding::create([
            'bu_name'       => $request['bu_name'],
            'bu_price'      => $request['bu_price'],
            'bu_type'       => $request['bu_type'],
            'bu_rooms'      => $request['bu_rooms'],
            'bu_rent'       => $request['bu_rent'],
            'bu_small_dis'  => $request['bu_small_dis'],
            'bu_square'     => $request['bu_square'],
            'bu_meta'       => $request['bu_meta'],
            'bu_langtude'   => $request['bu_langtude'],
            'bu_latitude'   => $request['bu_latitude'],
            'bu_large_dis'  => $request['bu_large_dis'],
            'bu_status'     => $request['bu_status'],
            'bu_gov'        => $request['bu_gov'],
            'year'          => date('Y'),
            'bu_image'      => $image,
        ]);

        $Buliding->admins()->sync(auth()->admin()->id(), false);
        
        return redirect('/admin-panal/buildings')->withFlashMessage('Done Operation !!');
    }
    
    public function edit($id)
    {
        $bu_id = DB::table('buliding_user')->where('buliding_id', $id)->first();

        $bu = Buliding::find($bu_id->buliding_id);
        $bu != null ? $build = $bu : $build = 0;

        $user = User::find($bu_id != null ? $bu_id->user_id : 0);
        return view('admin.buildings.edit', compact('build', 'user'));
    }

    public function UserOrders()
    {
        $id = Auth::user()->id;
        $orders = Order::where('user_id', $id)->paginate(9);
        return view('pages.profile', compact('orders'));
    }
    
    public function update(BuRequest $request, $id)
    {
        $build = Buliding::find($id);
        if($request->file('bu_image')){
            $filename = uploadimage($request->file('bu_image'), '/public/one/uploads/', '750', '750', $build->bu_image);
            if(!$filename) return back()->withFlashMessage('Please Choose another image that has a size (750x750) !!');
            $build->fill(['bu_image' => $filename])->save();
        }else{
            $build->fill(array_except($request->all(), ['bu_image']))->save();
        }
        $build->admins()->sync(auth()->user()->id);
        return back()->withFlashMessage('Done Operation !!');
    }
    
    public function destroy($id)
    {
        // Soft Delete the Buliding from database and Mark it as Deleted;
        Buliding::destroy(intval($id));
        return redirect('/admin-panal/buildings')->withFlashMessage('Done Operation!');
    }

    public function getTrashed()
    {
        // Get all Soft Deletes Bulidings From Database;
        $trash = Buliding::onlyTrashed()->paginate(4);
        return $trash != null ? view('admin.buildings.delete', compact('trash')) : redirect('/admin-panal');
    }

    public function restore($id)
    {
        // Restore the Current $id from SoftDeletes and Make it as updeleted;
        $Buliding = Buliding::where('id', intval($id));
        
        if($Buliding != null){
            DB::table('Bulidings')->where('id', intval($id))->update(['deleted_at' => null]);
            return back()->withFlashMessage('You have Restore the Building Successfully');
        }else{
            return back()->withFlashMessage('UNKNOWN ERROR');
        }
    }

    public function forceDelete($id)
    {
        // Force Delete the SoftDeletes $id From Database;
        // - Select the Product that we want to delete;
        $Buliding = Buliding::where('id', intval($id));
        
        if($Buliding == null){
            return back()->withFlashMessage('Sorry, this Building is not found !!');
        }else{
            // - Delete all the Product Referances in the product_tag Table;
            DB::table('admin_buliding')->where('buliding_id', intval($id))->delete();

            // - Delete The Product From Database;
            $Buliding->forceDelete();

            Buliding::onlyTrashed()->where('id', intval($id))->forceDelete();
            return back()->withFlashMessage('You have remove this building Perminately');
        }
    }
    
    public function anyData(Request $request)
    {        
        if(isset($request->user_id))
        {
            $ids = DB::table('buliding_user')->where('user_id', $request->user_id)->get();

            $bu_ids = [];

            foreach($ids as $key => $value){ $bu_ids[$key] = $value->buliding_id; }

            $bu = DB::table('bulidings')->whereIn('id', $bu_ids)->get();
        }
        else
        {
            $bu = Buliding::all();
        }
        
        return DataTables::of($bu)
        
        ->editColumn('bu_name', function($bu){ return Html::link('/admin-panal/buildings/'.$bu->id.'/edit', ucfirst($bu->bu_name)); })
        
        ->editColumn('bu_type', function ($bu){ return Html::tag('span', $bu->bu_type, ['class' => 'label label-info h4']); })
        
        ->editColumn('bu_price', function ($bu){ return GetMoney($bu->bu_price); })
        
        ->editColumn('bu_rent', function ($bu){
            $yes = Html::tag('span', 'Yes', ['class' => 'label label-success h4']);
            $no = Html::tag('span', 'No', ['class' => 'label label-danger h4']);
            return ($bu->bu_rent == 'Yes') ? $yes : $no;
        })  
        
        ->editColumn('bu_status', function ($bu){
            $active = Html::tag('span', 'Active', ['class' => 'label label-success h4']);
            $disactive = Html::tag('span', 'Disactive', ['class' => 'label label-danger h4']);
            
            if($bu->bu_status == 'Active') return $active;

            elseif($bu->bu_status == 'Disactive') return $disactive;

            else return "Error";
        })
        
        ->editColumn('delete', function($bu){
            return Html::link('/admin-panal/buildings/'.$bu->id.'/destroy' , ' ', ['class' => 'btn btn-danger glyphicon glyphicon-remove btn-sm', 'title'=>'Delete']);
        })
        
        ->editColumn('edit', function ($bu){
            return Html::link('/admin-panal/buildings/'.$bu->id.'/edit' , ' ', ['class' => 'btn btn-info glyphicon glyphicon-edit btn-sm', 'title'=>'Edit']);
        })->make(true);
    }
    
    public function buildings()
    {
        $buildings = Buliding::status()->paginate(9);
        return view('store.buildings', compact('buildings'));
    }
    
    public function ForRent()
    {
        $buildings = Buliding::status()->where('bu_rent', 'Yes')->paginate(9);
        return view('store.buildings', compact('buildings'));
    }
    
    public function ForBuy()
    {
        $buildings = Buliding::status()->where('bu_rent', 'No')->paginate(9);
        return view('store.buildings', compact('buildings'));
    }
    
    public function ShowByType($type)
    {
        if(in_array($type, ['Apartment', 'Villa', 'Shallih'])){
            $buildings = Buliding::status()->where('bu_type', $type)->paginate(9);
            return view('store.buildings', compact('buildings'));
        }else{
            return back();
        }
    }
    
    public function search(Request $request)
    {
        $requests = array_except($request->toArray(), ['_token', 'submit', 'page']);
        $i = 0;
        $count = count($requests);
        $query = DB::table('bulidings')->select('*');
        
        foreach ($requests as $key => $value)
        {
            $i++;
            if($value != null)
            {
                // if the price from has a value and price to has no value;
                if($key == 'bu_price_from' && $request->bu_price_to == '') $query->where('bu_price', '>=',$value);

                // if the price to has a value and price from has no value;
                elseif($key == 'bu_price_to' && $request->bu_price_from == '') $query->where('bu_price', '<=', $value);

                // if the price (from and to) has no value;
                else if($key != 'bu_price_to' && $key != 'bu_price_from') $query->where($key, $value);
            }
            elseif($count = $i && $request->bu_price_to != '' && $request->bu_price_from)
            {
                $query->whereBetween('bu_price', [$request->bu_price_from, $request->bu_price_to]);
            }
        }
        $buildings = $query->paginate(6);
        return view('store.buildings', compact('buildings'));
    }
    
    public function build($build_id)
    {
        $buildinfo = Buliding::whereId($build_id)->first();
        if($buildinfo->bu_status == 'Disactive') return view('user.waited', compact('buildinfo'));
        $recommed_rent = Buliding::where('bu_rent', $buildinfo->bu_rent)->randoms(3);
        $recommed_type = Buliding::where('bu_type', $buildinfo->bu_type)->randoms(3);
        return view('store.build', compact('buildinfo', 'recommed_rent', 'recommed_type'));
    }

    public function userStore(BuRequest $request)
    {
        //dd($request->toArray());
        if($request->file('bu_image')){
            $filename = uploadimage($request->file('bu_image'));
            if(!$filename){ return back()->withFlashMessage('Please Choose another image that has a size (750x750) !!'); }
            $image = $filename;
        }else{ $image = ''; }

        $Buliding = Buliding::create([
            'bu_name'       => $request->bu_name,
            'bu_price'      => $request->bu_price,
            'bu_type'       => $request->bu_type,
            'bu_rooms'      => $request->bu_rooms,
            'bu_rent'       => $request->bu_rent,
            'bu_small_dis'  => strip_tags(str_limit($request->bu_large_dis, 160)),
            'bu_square'     => $request->bu_square,
            'bu_meta'       => $request->bu_meta,
            'bu_langtude'   => $request->bu_langtude,
            'bu_latitude'   => $request->bu_latitude,
            'bu_large_dis'  => $request->bu_large_dis,
            'bu_gov'        => $request->bu_gov,
            'year'          => date('Y'),
            'bu_image'      => $image,
        ]);

        $Buliding->users()->sync(auth()->user()->id, false);
        return back()->withFlashMessage('You have Successfully addeed a new Building, Congratulation !!');
    }
    public function UserActiveBuildings($user)
    {
        $id = Auth::user()->id;
        $userbu = getUserBu($id, 'Active');

        return view('pages.profile', compact('userbu'));
    }
    public function UserDisactiveBuildings($user)
    {
        $id = Auth::user()->id;
        $userbu = getUserBu($id, 'Disactive');
        return view('pages.profile', compact('userbu'));
    }

    public function UserEditBuilding($id)
    {
        $auth = Auth::user();
        $bu = DB::table('buliding_user')->where('buliding_id', intval($id))->first();

        $build = Buliding::find($bu->buliding_id);

        if($auth->id != $bu->user_id)
        {
            return back()->withFlashMessage('Sorry, you are not the owener of this building, so you do not have the permission to access it!');
        }
        elseif($build->bu_status == 'Active')
        {
            return back()->withFlashMessage('Sorry, this Building is active if you want to make any change contact us and send an order. thank you!');
        }
        else
        {
            return view('user.buEdit', compact('build'));
        }
    }

    public function UserUpdateBuilding(BuRequest $request)
    {
        $id = $request->id;
        
        $build = Buliding::find($id);
        
        if($request->file('bu_image')){

            $filename = uploadimage($request->file('bu_image'), '/public/one/uploads/', '750', '750', $build->bu_image);
            
            if(!$filename) return back()->withFlashMessage('Please Choose another image that has a size (750x750) !!');

            $build->fill(['bu_image' => $filename])->save();
        }else{
            $build->fill(array_except($request->all(), ['bu_image']))->save();
        }
        $build->users()->sync(auth()->user()->id);
        return back()->withFlashMessage('You have updated Building INformation Successfully');
    }
    
    public function ChangeStatus($id, $status)
    {
        Buliding::find($id)->update(['bu_status' => $status]);
        return back()->withFlashMessage('You have change the building status to '.$status.' successfully');
    }

    public function Order($type, $id)
    {
        $buildinfo = Buliding::find($id);
        return view('store.order', compact('buildinfo', 'type'));
    }
    public function Rent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'custumer_name' => 'required|max:200|min:3',
            'custumer_email' => 'required|email|max:200|min:18',
            'custumer_tel' => 'required|max:11|min:11',
        ]);

        if($validator->fails()){
            return back()->withFlashMessage('Sorry there is something wrong, try again !!');
        }else{
            $chk = Order::where('user_id', $request->user_id)->where('bu_id', $request->bu_id)->get();
            if($chk == ''){
                return redirect('/')->withFlashMessage('Sorry, you are already added this Building !!');
            }else{
                Order::create([
                    'bu_id' => $request->bu_id,
                    'bu_rent' => $request->bu_rent,
                    'fullname' => $request->custumer_name,
                    'email' => $request->custumer_email,
                    'user_id' => $request->user_id,
                    'mobile' => $request->custumer_tel,
                ]);
                return redirect('/')
                ->withFlashMessage('Thank you, your order has been registered Successfully you can contact with us to Know more information !!');
            }
        }
    }
}
