<?php

use App\SiteContent;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // SiteContent::create(
        //     [
        //         'name'=>'banner',
        //         'content'=>json_encode([
        //       'title'=>"Every Student yearns to learn",
        //       'subtitle'=>"Making Your Childs World Better",
        //       'description'=>"Replenish seasons may male hath fruit beast were seas saw you arrie said man beast whales his void unto last session for bite. Set have great you'll male grass yielding yielding man"
        //         ])
        //     ]
        // );
        SiteContent::create([
            'name'=>'advance',
'content'=>json_encode([
    'title'=>'Advance feature',
    'sub'=>'Our Pro Educator Learning System',
    'desc'=>'Fifth saying upon divide divide rule for deep their female all hath brind mid Days and beast greater grass signs abundantly have greater also use over face earth days years under brought moveth she star',
    
])
        ]);
    }
}
