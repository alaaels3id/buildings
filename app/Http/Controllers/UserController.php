<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\AddUsersAdminRequest;
use App\Http\Requests\PasswordChangeRequest;
use App\Http\Requests\EditUserRequest;
use Redirect;
use Hash;
use App\User;
use App\Buliding;
use DataTables;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.add');
    }
    public function show()
    {
        //
    }
    public function store(AddUsersAdminRequest $request)
    {
        if($request->file('user_image')){
            
            $filename = uploadimage($request->file('user_image', '/public/one/uploads/users/'));
            
            if(!$filename){return back()->withFlashMessage('Please Choose another image that has a size (750x750) !!');}
            
            $image = $filename;

        }else $image = '';
        
        User::create([
            'name'       => $request->name,
            'username'   => $request->username,
            'email'      => $request->email,
            'password'   => $request->password,
            'location'   => $request->location,
            'dob'        => $request->dob,
            'user_image' => $image,
        ]);
        return redirect('/admin-panal/users')->withFlashMessage('Done Operation !!');
    }

    public function edit($id)
    {
        $user = User::find($id);
        
        $buActive = getUserBu($user->id, 'Active');
        $buDisactive = getUserBu($user->id, 'Disactive');
        
        return view('admin.users.edit', compact('user', 'buActive', 'buDisactive'));
    }

    public function update(EditUserRequest $request, $id)
    {
        $user = User::find($id);
        SetUploadedFile($request, $user);
        return back()->withFlashMessage('Done Operation !!');
    }

    public function destroy($user_id)
    {
        User::destroy($user_id);
        return redirect()->route('users.index')->withFlashMessage('Done Operation!');
    }

    public function updatePassword(Request $request)
    {
        Admin::find($request->id)->update(['password' => $request->password]);
        return redirect()->route('users.index')->withFlashMesssage('Password has been changed successfully');
    }

    public function anyData()
    {
        $users = User::all();
        return DataTables::of($users)

            ->editColumn('name', function ($users) {
                return \Html::link('/admin-panal/users/' . $users->id . '/edit', ucfirst($users->name));
            })

            ->editColumn('mybus', function($users){
                return \Html::link('/admin-panal/buildings/' . $users->id . '/', " ", ['class' => 'btn btn-danger delete glyphicon glyphicon-user']);
            })

            ->editColumn('dob', function ($users) {
                return $users->dob->format('Y-m-d');
            })

            ->editColumn('email', function ($users) {
                $str = substr($users->email, 0, 20);
                return strlen($str) < 20 ? $str : $str . '...';
            })

            ->editColumn('age', function ($users) {
                return $users->dob->age;
            })

            ->editColumn('user_image', function($users){

                $image = ($users->user_image == '') ? 'one/uploads/no_image.jpg' : 'one/uploads/users/' . $users->user_image;

                return \Html::image($image, null, ['class'=>'img-responsive', 'width'=>'50', 'height'=>'50']); 
            })
            ->addColumn('delete', function ($users) {
                return \Html::link('/admin-panal/users/' . $users->id . '/destroy', " ", ['class' => 'btn btn-danger delete glyphicon glyphicon-remove', 'title' => 'Delete']);
            })
            ->addColumn('edit', function ($users) {
                return \Html::link('/admin-panal/users/' . $users->id . '/edit', " ", ['class' => 'btn btn-info glyphicon glyphicon-edit', 'title' => 'Edit']);
            })->make(true);
    }
    public function EditUserProfile()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    public function UpdateUserData(EditUserRequest $request)
    {
        $auth = Auth::user();
        SetUploadedFile($request, $auth);
        return redirect()->back()->withFlashMessage('You have edit the information successfully !!');
    }
    public function UserChangePasssword(PasswordChangeRequest $request)
    {
        $auth = Auth::user();
        $id = $auth->id;
        if(Hash::check($request->password, $auth->password)){
            User::find($id)->update(['password' => $request->newpassword]);
            return back()->withFlashMessage('You have Changed the Password Successfully !!');   
        }else{
            return back()->withFlashMessage('Sorry, the password you have entered is not matched with we have !!');
        }
    }
}
