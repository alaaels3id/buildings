<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactusRequest;
use Illuminate\Support\Facades\Redirect;
use App\ContactUs;
use DataTables;

class ContactusController extends Controller
{
    public function index()
    {
        return view('admin.contactus.index');
    }

    public function store(ContactusRequest $request)
    {
        ContactUs::create($request->all());
        return Redirect::back()->withFlashMessage('Sending Message Done Successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $contact = ContactUs::find($id);
        $contact->update(['co_view' => 'Yes']);
        return view('admin.contactus.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        ContactUs::find($id)->update($request->all());
        return Redirect::back()->withFlashMessage('Message updated Successfully');
    }

    public function destroy($id)
    {
        ContactUs::destroy($id);
        return redirect('admin-panal/contactus/')->withFlashMessage('Message Deleted Successfully !');
    }

    public function anyData()
    {
        $co = ContactUs::all();
        return DataTables::of($co)
        
        ->editColumn('co_name', function($model){
            return \Html::link('/admin-panal/contactus/'.$model->id.'/edit', ucfirst($model->co_name));
        })
        
        ->editColumn('co_type', function ($model){
            return \Html::tag('span', $model->co_type, ['class' => 'label label-info']);
        })

        ->editColumn('co_message', function ($model){
            return str_limit(ucfirst($model->co_message), $limit = 20, $end = '...');
        })

        ->editColumn('co_subject', function ($model){
            return ucfirst($model->co_subject);
        })
        
        ->editColumn('co_view', function ($model){
            
            $yes = \Html::tag('span', 'Yes', ['class' => 'label label-success']);
            $no = \Html::tag('span', 'No', ['class' => 'label label-info']);
            
            if($model->co_view == 'Yes') return $yes;
            elseif($model->co_view == 'No') return $no;
            else return "Error";
        })
        
        ->editColumn('delete', function($model){
            return \Html::link('/admin-panal/contactus/'.$model->id.'/destroy' , ' ', ['class' => 'btn btn-danger glyphicon glyphicon-remove btn-sm', 'title' => 'Delete']);
        })
        
        ->editColumn('edit', function ($model){
            return \Html::link('/admin-panal/contactus/'.$model->id.'/edit' , ' ', ['class' => 'btn btn-info glyphicon glyphicon-edit btn-sm', 'title' => 'Edit']);
        })->make(true);
    }
}
