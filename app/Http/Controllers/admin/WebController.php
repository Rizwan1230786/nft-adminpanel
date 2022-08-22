<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Web;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class WebController extends Controller
{
    public function index()
    {
        $pageConfigs = ['pageHeader' => false];
        $user = Web::all();
        return view('admin/module/webpages/webpage-list', compact('pageConfigs', 'user'));
    }
    ////Form view Function
    public function create(){
        return view('admin/module/webpages/form-webpage');
    }
    ////Function for Adding data
    public function submit(Request $request)
    {
        $type='error';
        $validator = Validator::make($request->all(), [
            'page_content' => 'required',
        ]);
        if($validator->fails()){
            $message = $validator->errors()->first();
        }else{
            $data = $request->except('_token');
            if(isset($data['image']) && !empty($data['image'])){
                $imageName = time() . '.' . $data['image']->extension();
                $data['image'] = $imageName;
                $request->image->move(public_path('webpages/images'), $imageName);
            }
            $query=Web::create($data);
            if(isset($query) && !empty($query)){
                $type="success";
                $message="Webpage Added Successfully";
            }
        }
        return response()->json(['type'=>$type,'message'=>$message]);
    }
    /////Function for edit data
    public function edit($id)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Forms"], ['name' => "Form Layouts"]
        ];
        $webpages = Web::find($id);
        return view('admin/module/webpages/form-webpage', [
            'breadcrumbs' => $breadcrumbs, 'webpages'=>$webpages
        ]);
    }
    ///// Function Update Data
    public function update(Request $request, $id)
    {
        $type='error';
        $validator = Validator::make($request->all(),[
        ]);
        if($validator->passes()){
            $data = $request->except('_token');
            if (isset($data['image']) && !empty($data['image'])) {
                $oldimage=web::find($id);
                if(isset($oldimage) && !empty($oldimage)){
                    $oldimage=public_path('webpages/images/'.$oldimage->image);
                    if(File::exists($oldimage)) {
                        File::delete($oldimage);
                    }
                }
                $imageName = time() . '.' .$data['image']->extension();
                $data['image'] = $imageName;
                $request->image->move(public_path('webpages/images'), $imageName);
            }
            $query=Web::where("id", $id)->update($data);
            if(isset($query) && !empty($query)){
                $type='success';
                $message="Webpage Updated Successfully";
            }
        }else{
            $message = $validator->errors()->toArray();
        }
        return response()->json(['type'=>$type,'message'=>$message]);
    }
    ////Function for Delete data
    public function destory($id)
    {
        $data = Web::findOrFail($id);
        $oldimage=public_path('images/'.$data->image);
            if(File::exists($oldimage)) {
                File::delete($oldimage);
                }
        $user = $data->delete();
        if ($user) {
            return response(['status' => true]);
        } else {
            return response(['status' => false]);
        }
    }
    ///////status function///////
    public function status(Request $request)
    {
        $user = Web::find($request->id);
            $user->is_publish = $request->is_publish;
            $user->save();
            return response()->json(['status' => true]);

    }
}
