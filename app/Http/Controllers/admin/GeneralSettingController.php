<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Generalsetting;
use Illuminate\Support\Facades\File;

class GeneralSettingController extends Controller
{
    public function create()
    {
        $updatedId = 1;
        $data = Generalsetting::where('id', $updatedId)->first();
        return view('admin.module.generalsetting.create', compact('data'));
    }
    public function submit(Request $request)
    {

        $type = 'error';
        $updatedId = 1;
        $data = $request->all();
        if (isset($request->header_logo) && !empty($request->header_logo)) {
            $oldimage = Generalsetting::find($updatedId);
            if (isset($oldimage->header_logo) && !empty($oldimage->header_logo)) {
                $oldimage = public_path('setting/header/' . $oldimage->header_logo);
                if (File::exists($oldimage)) {
                    File::delete($oldimage);
                }
            }
            $imageName = $request->header_logo->getClientOriginalName();
            $data['header_logo'] = $imageName;
            $request->header_logo->move(public_path('setting/header'), $imageName);
        }
        if (isset($request->favicon_image) && !empty($request->favicon_image)) {
            $oldimage = Generalsetting::find($updatedId);
            if (isset($oldimage->favicon_image) && !empty($oldimage->favicon_image)) {
                $oldimage = public_path('setting/header/' . $oldimage->favicon_image);
                if (File::exists($oldimage)) {
                    File::delete($oldimage);
                }
            }
            $imageName = $request->favicon_image->getClientOriginalName();
            $data['favicon_image'] = $imageName;
            $request->favicon_image->move(public_path('setting/header'), $imageName);
        }
        if (isset($request->website_logo) && !empty($request->website_logo)) {
            $oldimage = Generalsetting::find($updatedId);
            if (isset($oldimage->website_logo) && !empty($oldimage->website_logo)) {
                $oldimage = public_path('setting/header/' . $oldimage->website_logo);
                if (File::exists($oldimage)) {
                    File::delete($oldimage);
                }
            }
            $imageName = time().''.$request->website_logo->getClientOriginalName();
            $data['website_logo'] = $imageName;
            $request->website_logo->move(public_path('setting/header'), $imageName);
        }
        if (isset($request->header_bg_img) && !empty($request->header_bg_img)) {
            $oldimage = Generalsetting::find($updatedId);
            if (isset($oldimage->header_bg_img) && !empty($oldimage->header_bg_img)) {
                $oldimage = public_path('setting/header/' . $oldimage->header_bg_img);
                if (File::exists($oldimage)) {
                    File::delete($oldimage);
                }
            }
            $imageName = time().''.$request->header_bg_img->getClientOriginalName();
            $data['header_bg_img'] = $imageName;
            $request->header_bg_img->move(public_path('setting/header'), $imageName);
        }
        if (isset($request->footer_bg_img) && !empty($request->footer_bg_img)) {
            $oldimage = Generalsetting::find($updatedId);
            if (isset($oldimage->footer_bg_img) && !empty($oldimage->footer_bg_img)) {
                $oldimage = public_path('setting/header/' . $oldimage->footer_bg_img);
                if (File::exists($oldimage)) {
                    File::delete($oldimage);
                }
            }
            $imageName = time().''.$request->footer_bg_img->getClientOriginalName();
            $data['footer_bg_img'] = $imageName;
            $request->footer_bg_img->move(public_path('setting/header'), $imageName);
        }
        Generalsetting::updateorcreate(array('id' => $updatedId), $data);
        $type = "success";
        $message = "Setting Updated Successfully";
        return response()->json(['type' => $type, 'message' => $message]);
    }
}
