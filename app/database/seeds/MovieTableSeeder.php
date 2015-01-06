<?php

class MovieTableSeeder extends Seeder
{
    public function run()
    {
//        DB::table('movies')->delete();

        Movie::create(array(
            'name' => 'Stepmom',
            'year' => '1998'
        ));

        Movie::create(array(
            'name' => 'The Notebook',
            'year' => '2001'
        ));
    }
}