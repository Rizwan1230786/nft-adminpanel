<?php

namespace App\Http\Controllers\admin\blog;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        $user =  Blog::all();
        return view('admin.module.blog.blog-list', get_defined_vars());
    }
    public function create()
    {
        return view('admin.module.blog.form-blog');
    }
    public function submit(Request $request)
    {
        $floder=date('M-y');
        $type = 'error';
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            $message = $validator->errors()->first();
        } else {
            $data = $request->except('_token');
            if (isset($data['image']) && !empty($data['image'])) {
                $imageName = time() . '.' . $data['image']->extension();
                $data['image'] = $floder.'/'.$imageName;
                $request->image->move(public_path('images/blog/'.$floder), $imageName);
            }
            $query = Blog::create($data);
            if (isset($query) && !empty($query)) {
                $type = "success";
                $message = "Blog Added Successfully";
            }
        }
        return response()->json(['type' => $type, 'message' => $message]);
    }
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.module.blog.form-blog', get_defined_vars());
    }
    public function update(Request $request, $id)
    {
        $floder=date('M-y');
        $type = 'error';
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);
        if ($validator->fails()) {
            $message = $validator->errors()->first();
        } else {
            $data = $request->except('_token');
            if (isset($data['image']) && !empty($data['image'])) {
                $oldimage = Blog::find($id);
                if (isset($oldimage->image) && !empty($oldimage->image)) {
                    $oldimage = public_path('/images/blog/'. $oldimage->image);
                    if (File::exists($oldimage)) {
                        File::delete($oldimage);
                    }
                }
                $imageName = time() . '.' . $data['image']->extension();
                $data['image'] = $floder.'/'.$imageName;
                $request->image->move(public_path('images/blog/'.$floder), $imageName);
            }
            $query = Blog::where('id', $id)->update($data);
            if (isset($query) && !empty($query)) {
                $type = "success";
                $message = "Blog Updated Successfully";
            }
        }
        return response()->json(['type' => $type, 'message' => $message]);
    }
    public function destory($id)
    {
        $data = Blog::find($id);
        if (isset($data) && !empty($data)) {
            $oldimage = public_path('images/blog/'. $data->image);
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
        $user = Blog::find($request->id);
            $user->status = $request->status;
            $user->save();
            return response()->json(['status' => true]);
    }
}
