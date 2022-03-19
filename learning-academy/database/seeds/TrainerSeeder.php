<?php

use App\Trainer;
use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=1;$i<=5;$i++){
            Trainer::create([
                'name'=>'endo'.$i,
                'spec'=>'spec'.$i,
                'img'=>$i.'.png'
            ]);
        }
    }
}
