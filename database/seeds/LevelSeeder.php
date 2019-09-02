<?php

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = ['CP1','CP2','CI1','CI2','CI3'];

        foreach ($levels as $level){
            $l = new \App\Level();
            $l->level_name  =$level;
            $l->save();
        }


    }
}
