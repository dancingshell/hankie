<?php
/**
 * Created by PhpStorm.
 * User: kaitlin
 * Date: 1/5/15
 * Time: 4:09 PM
 */

class Bookmark extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bookmarks';

    public function users()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function movies()
    {
        return $this->belongsTo('Movie', 'movie_id');
    }
}