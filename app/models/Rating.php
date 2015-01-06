<?php
/**
 * Created by PhpStorm.
 * User: kaitlin
 * Date: 1/5/15
 * Time: 4:08 PM
 */

class Rating extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ratings';

    public function users()
    {
        return $this->belongsTo('User');
    }

    public function movies()
    {
        return $this->belongsTo('Movie');
    }
}