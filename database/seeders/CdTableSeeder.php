<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cd;
use App\Models\Tag;

class CdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 10; $i++) {
            $cd = new \App\Models\Cd(['title'=>'title'.$i ,'description'=> 'description'.$i ]);


            for ($j = 0; $j <= 10; $j++) {
                $title = new \App\Models\Title(['name'=>'name'.$j , 'duration'=> 'duration'.$j , 'cd_id'=> $i]);
            }

            if($i===1 )
            {
                $tag1 = new \App\Models\Tag(['name'=> 'rock' , 'cd_id'=> $i]);
                $tag = new \App\Models\Tag(['name'=> 'jazz' , 'cd_id'=> $i]);
                $tag1->save();
                $tag->save();
            }

            $cd->save();
            $title->save();
        }

       $cd = Cd::find(2);
       $cd->tag_id = 1;
       $cd->save();
    }
}
