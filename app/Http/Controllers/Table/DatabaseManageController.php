<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseManageController extends Controller
{
    public function Add(){
        DB::select('ALTER TABLE `sellers` ADD `phoneno` VARCHAR(191) NULL DEFAULT NULL AFTER `email`;');
    }
}
