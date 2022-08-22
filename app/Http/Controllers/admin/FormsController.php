<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class FormsController extends Controller
{
    public function input()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Form Elements"], ['name' => "Input"]
        ];
        return view('admin/module/forms/form-elements/form-input', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Form Elements - Input-groups
    public function input_groups()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Form Elements"], ['name' => "Input Groups"]
        ];
        return view('admin/module/forms/form-elements/form-input-groups', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Form Elements - Input-mask
    public function input_mask()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Form Elements"], ['name' => "Input Mask"]
        ];
        return view('admin/module/forms/form-elements/form-input-mask', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Form Elements - Textarea
    public function textarea()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Form Elements"], ['name' => "Textarea"]
        ];
        return view('admin/module/forms/form-elements/form-textarea', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Form Elements - Checkbox
    public function checkbox()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Form Elements"], ['name' => "Checkbox"]
        ];
        return view('admin/module/forms/form-elements/form-checkbox', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Form Elements - Radio
    public function radio()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Form Elements"], ['name' => "Radio"]
        ];
        return view('admin/module/forms/form-elements/form-radio', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Form Elements - custom_options
    public function custom_options()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Form Elements"], ['name' => "Custom Options"]
        ];
        return view('admin/module/forms/form-elements/form-custom-options', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Form Elements - Switch
    public function switch()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Form Elements"], ['name' => "Switch"]
        ];
        return view('admin/module/forms/form-elements/form-switch', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Form Elements - Select
    public function select()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Form Elements"], ['name' => "Select"]
        ];
        return view('admin/module/forms/form-elements/form-select', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Form Elements - Number Input
    public function number_input()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Form Elements"], ['name' => "Number Input"]
        ];
        return view('admin/module/forms/form-elements/form-number-input', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // File Uploader
    public function file_uploader()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Form Elements"], ['name' => "File Uploader"]
        ];
        return view('admin/module/forms/form-elements/form-file-uploader', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Quill Editor
    public function quill_editor()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Form Elements"], ['name' => "Quill Editor"]
        ];
        return view('admin/module/forms/form-elements/form-quill-editor', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Form Elements - Date & time Picker
    public function date_time_picker()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Form Elements"], ['name' => "Date & Time Picker"]
        ];
        return view('admin/module/forms/form-elements/form-date-time-picker', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Form add user
   
    // Form edit user
  
    // Form Layouts
    public function layouts()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Forms"], ['name' => "Form Layouts"]
        ];
        return view('admin/module/forms/roles-form', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }
    // Form Layouts
    // Form Wizard
    public function wizard()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Forms"], ['name' => "Form Wizard"]
        ];
        return view('admin/module/forms/form-wizard', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Form Validation
    public function validation()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Forms"], ['name' => "Form Validation"]
        ];
        return view('/module/forms/form-validation', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }
    // Form repeater
    public function form_repeater()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Forms"], ['name' => "Form Repeater"]
        ];
        return view('/module/forms/form-repeater', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }
}
