<?php

use App\Models\Plan;
use App\Models\PlanDetail;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {                
        factory(Plan::class, 10)->create()->each(function($plan) {
            factory(PlanDetail::class, 5)->create([
                'plan_id' => $plan->id
            ]);

        });        
    }
}
