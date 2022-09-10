<?php

namespace App\Http\Controllers\admin\category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $user =  Category::all();
        return view('admin.module.category.index', get_defined_vars());
    }
    public function create()
    {
        return view('admin.module.category.create');
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
                $request->image->move(public_path('images/category/'.$floder), $imageName);
            }
            $query = Category::create($data);
            if (isset($query) && !empty($query)) {
                $type = "success";
                $message = "Category Added Successfully";
            }
        }
        return response()->json(['type' => $type, 'message' => $message]);
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.module.category.create', get_defined_vars());
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
                $oldimage = Category::find($id);
                if (isset($oldimage->image) && !empty($oldimage->image)) {
                    $oldimage = public_path('/images/category/'. $oldimage->image);
                    if (File::exists($oldimage)) {
                        File::delete($oldimage);
                    }
                }
                $imageName = time() . '.' . $data['image']->extension();
                $data['image'] = $floder.'/'.$imageName;
                $request->image->move(public_path('images/category/'.$floder), $imageName);
            }
            $query = Category::where('id', $id)->update($data);
            if (isset($query) && !empty($query)) {
                $type = "success";
                $message = "Category Updated Successfully";
            }
        }
        return response()->json(['type' => $type, 'message' => $message]);
    }
    public function destory($id)
    {
        $data = Category::find($id);
        if (isset($data) && !empty($data)) {
            $oldimage = public_path('images/category/'. $data->image);
            if (File::exists($oldimage)) {
                File::delete($oldimage);
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
        $user = Category::find($request->id);
            $user->status = $request->status;
            $user->save();
            return response()->json(['status' => true]);
    }

}
