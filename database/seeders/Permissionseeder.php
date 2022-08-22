<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class Permissionseeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('permissions')->insert([
         [
            'name' => 'permission-list',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
         ],
         [
            'name' => 'permission-create',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
         ],
         [
            'name' => 'permission-edit',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
         ],
         [
            'name' => 'permission-delete',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
         ],
         [
            'name' => 'role-list',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
         ],
         [
            'name' => 'role-create',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
         ],
         [
            'name' => 'role-edit',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
         ],
         [
            'name' => 'role-delete',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
         ],
         [
            'name' => 'user-list',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
         ],
         [
            'name' => 'user-create',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
         ],
         [
            'name' => 'user-edit',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
         ],
         [
            'name' => 'user-delete',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
         ],
         [
            'name' => 'webpages-list',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
         ],
         [
            'name' => 'webpages-create',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
         ],
         [
            'name' => 'webpages-edit',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
         ],
         [
            'name' => 'webpages-delete',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
         ],
         [
            'name' => 'NfcRequest-delete',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
         ],
         [
            'name' => 'incomereport-list',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),

         ],
         [
            'name' => 'incomereport-create',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),

         ],
         [
            'name' => 'incomereport-edit',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),

         ],
         [
            'name' => 'incomereport-delete',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),

         ],
         [
            'name' => 'seller-list',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),

         ],
         [
            'name' => 'goldseller-list',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),

         ],
         [
            'name' => 'personalseller-list',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),

         ],
         [
            'name' => 'sellerlink-list',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),

         ],
         [
            'name' => 'services-list',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),

         ],
         [
            'name' => 'customer-list',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),

         ]
      ]);
   }
}
