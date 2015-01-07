<?php
/**
 * Created by PhpStorm.
 * User: kaitlin
 * Date: 1/5/15
 * Time: 4:08 PM
 */

class Rating extends Eloquent
{

    protected $fillable = ['movie_id', 'user_id', 'score'];
    /**
     * The database table used by the model.
     *
     * @var string
     *
     */
    protected $table = 'ratings';

    public function users()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function movies()
    {
        return $this->belongsTo('Movie', 'movie_id');
    }
}