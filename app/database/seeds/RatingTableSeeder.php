<?php
/**
 * Created by PhpStorm.
 * User: kaitlin
 * Date: 1/5/15
 * Time: 6:15 PM
 */

class RatingTableSeeder extends Seeder {
    public function run()
    {
        DB::table('ratings')->delete();

        Rating::create(array(
            'score' => '2',
            'user_id' => DB::table('users')->where('name', 'firstuser')->first()->id,
            'movie_id' => DB::table('movies')->where('name', 'Stepmom')->first()->id
        ));

        Rating::create(array(
            'score' => '3',
            'user_id' => DB::table('users')->where('name', 'seconduser')->first()->id,
            'movie_id' => DB::table('movies')->where('name', 'The Notebook')->first()->id
        ));
    }

}