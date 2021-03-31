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
            $cd->save();

            for ($j = 0; $j <= 10; $j++) {
                $title = new \App\Models\Title(['name'=>'name'.$j , 'duration'=> 'duration'.$j , 'cd_id'=> $i]);
                $cd->titles()->save($title);
                $title->save();
            }

        }

        $tag1 = new \App\Models\Tag(['name'=> 'rock' ]);
        $tag = new \App\Models\Tag(['name'=> 'jazz' ]);
        $tag1->save();
        $tag->save();

        $cd =Cd::find(1);
        $cd->tags()->attach($tag->id);

        $cd =Cd::find(2);
        $cd->tags()->attach($tag->id);

        $cd =Cd::find(3);
        $cd->tags()->attach($tag1->id);

    }
}
