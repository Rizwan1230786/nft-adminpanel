<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    // User List Page
    public function permisions_list(){
        return view('admin/module/apps/user/permisons');
    }
}
