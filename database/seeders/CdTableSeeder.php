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
        for ($i = 1; $i <= 10; $i++) {
            $cd = new \App\Models\Cd(['title'=>'Album '.$i ,'description'=> ' Annee 200'.$i.' par un groupe appele XXX' ]);
            $cd->save();

            for ($j = 1; $j <= 10; $j++) {
                $title = new \App\Models\Title(['name'=>'titre'.$j.' de l\'album' , 'duration'=> ' durée'.$j , 'cd_id'=> $i]);
                $cd->titles()->save($title);
                $title->save();
            }

        }

        $tag1 = new \App\Models\Tag(['name'=> 'rock' ]);
        $tag = new \App\Models\Tag(['name'=> 'jazz' ]);
        $tag1->save();
        $tag->save();

        $cd =Cd::find(4);
        $cd->tags()->attach($tag->id);

        $cd =Cd::find(3);
        $cd->tags()->attach($tag->id);

        $cd =Cd::find(4);
        $cd->tags()->attach($tag1->id);

    }
}
