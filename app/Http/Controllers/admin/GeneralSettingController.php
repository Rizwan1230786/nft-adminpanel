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
            $imageName = time() . '.' . $request->header_logo->extension();
            $data['header_logo'] = $imageName;
            $request->header_logo->move(public_path('setting/header'), $imageName);
        }
        Generalsetting::updateorcreate(array('id' => $updatedId), $data);
        $type = "success";
        $message = "Setting Updated Successfully";
        return response()->json(['type' => $type, 'message' => $message]);
    }
}
