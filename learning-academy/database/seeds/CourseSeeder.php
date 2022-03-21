<?php

use App\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=1;$i<=3;$i++){
            for($j=1;$j<=6;$j++){
Course::create([
    'cat_id'=>$i,
    'trainer_id'=>rand(1,5),
    'name'=>"course num $j in cat num $i",
    'small_desc'=>"lerom ipsum lerom ipsum lerom ipsum lerom ipsum lerom ipsum lerom ipsum ",
    'desc'=>"lerom ipsum lerom ipsum lerom ipsum lerom ipsum lerom ipsum lerom ipsum ",
    'price'=>rand(1000,5000),
    'img'=>"$i$j.png"
]);
            }
        }
    }
}
