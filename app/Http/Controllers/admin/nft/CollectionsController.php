<?php

namespace App\Http\Controllers\admin\nft;

use App\Models\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CollectionsController extends Controller
{
    public function index()
    {
        $user =  Collection::all();
        return view('admin.module.collection.index', get_defined_vars());
    }
    public function create()
    {
        $category=Category::select('id','name')->get();
        return view('admin.module.collection.create',get_defined_vars());
    }
    public function submit(Request $request)
    {
        $floder=date('M-y');
        $type = 'error';
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            $message = $validator->errors()->first();
        } else {
            $data = $request->except('_token');
            if (isset($data['image']) && !empty($data['image'])) {
                $imageName = time() . '.' . $data['image']->extension();
                $data['image'] = $floder.'/'.$imageName;
                $request->image->move(public_path('images/collection/logo/'.$floder), $imageName);
            }
            if (isset($data['banner_image']) && !empty($data['banner_image'])) {
                $imageName = time() . '.' . $data['banner_image']->extension();
                $data['banner_image'] = $floder.'/'.$imageName;
                $request->banner_image->move(public_path('images/collection/banners/'.$floder), $imageName);
            }
            $query = Collection::create($data);
            if (isset($query) && !empty($query)) {
                $type = "success";
                $message = "Collections Added Successfully";
            }
        }
        return response()->json(['type' => $type, 'message' => $message]);
    }
    public function edit($id)
    {
        $record = Collection::find($id);
        $category=Category::select('id','name')->get();
        return view('admin.module.collection.create', get_defined_vars());
    }
    public function update(Request $request, $id)
    {
        $floder=date('M-y');
        $type = 'error';
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            $message = $validator->errors()->first();
        } else {
            $data = $request->except('_token');
            if (isset($data['image']) && !empty($data['image'])) {
                $oldimage = Collection::find($id);
                if (isset($oldimage->image) && !empty($oldimage->image)) {
                    $oldimage = public_path('/images/collection/logo/'. $oldimage->image);
                    if (File::exists($oldimage)) {
                        File::delete($oldimage);
                    }
                }
                $imageName = time() . '.' . $data['image']->extension();
                $data['image'] = $floder.'/'.$imageName;
                $request->image->move(public_path('images/collection/logo/'.$floder), $imageName);
            }
            if (isset($data['banner_image']) && !empty($data['banner_image'])) {
                $oldimage = Collection::find($id);
                if (isset($oldimage->banner_image) && !empty($oldimage->banner_image)) {
                    $oldimage = public_path('/images/collection/banners/'. $oldimage->banner_image);
                    if (File::exists($oldimage)) {
                        File::delete($oldimage);
                    }
                }
                $imageName = time() . '.' . $data['banner_image']->extension();
                $data['banner_image'] = $floder.'/'.$imageName;
                $request->banner_image->move(public_path('images/collection/banners/'.$floder), $imageName);
            }
            $query = Collection::where('id', $id)->update($data);
            if (isset($query) && !empty($query)) {
                $type = "success";
                $message = "Collections Updated Successfully";
            }
        }
        return response()->json(['type' => $type, 'message' => $message]);
    }
    public function destory($id)
    {
        $data = Collection::find($id);
        if (isset($data) && !empty($data)) {
            $oldimage = public_path('images/collection/logo/'. $data->image);
            $oldimage1 = public_path('images/collection/banners/'. $data->banner_image);
            if (File::exists($oldimage)) {
                File::delete($oldimage);
            }
            if (File::exists($oldimage1)) {
                File::delete($oldimage1);
            }
        }
        $user = $data->delete();
        if (isset($user) && !empty($user)) {
            return response(['status' => true]);
        } else {
            return response(['status' => false]);
        }
    }
    public function status(Request $request)
    {
        $user = Collection::find($request->id);
            $user->status = $request->status;
            $user->save();
            return response()->json(['status' => true]);
    }
}
