<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['comment', 'post_id', 'name', 'email', 'user_id'];

    /**
     *  One Comment belongs to One Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post(){

        return $this->belongsTo('App\Post');
    }

    public function user(){

        return $this->belongsTo('App\User');
    }

}
