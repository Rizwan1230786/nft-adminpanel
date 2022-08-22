<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Income;
use carbon\Carbon;
use Illuminate\Support\Str;
class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $card = rand(10, 99);
        $revenue = rand(100, 999);
        $expences = rand(100, 999);
        if ($expences > $revenue) {
            $profit = 0;
            $loss = $expences - $revenue;
        } else {
            $profit = $revenue - $expences;
            $loss = 0;
        }
        for ($i=0; $i < 10; $i++) { 
            $date = Carbon::create(2022, 2, 1,);
	    	Income::create([
	            'month' => $date->format('Y-m-d'),
	            'no_card_sell' => $card,
	            'revenue' => $revenue ,
                'expences' =>$expences ,
                'profit' => $profit ,
                'loss' => $loss,
	        ]);
    	}
    }
}
