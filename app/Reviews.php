<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reviews';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['comment', 'store_id', 'name', 'email', 'user_id', 'rating'];

    /**
     *  One Comment belongs to One Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store()
    {

        return $this->belongsTo('App\Store');
    }

    public function user()
    {

        return $this->belongsTo('App\User');
    }

}
