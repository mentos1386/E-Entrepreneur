<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'store';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'price', 'stock', 'images', 'active'];


    /**
     *  One Store Item Belong to Many
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buyers()
    {
        return $this->belongsToMany('App\User', 'store_user', 'store_id', 'user_id');
    }

    /**
     *  One Store Item can have Many Reviews
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {

        return $this->hasMany('App\Reviews');
    }

    /**
     *  One Store Item can have Many Tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags()
    {

        return $this->belongsToMany('App\Tag', 'store_tag', 'store_id', 'tag_id');
    }

    /**
     *  One Store Item can have Many Categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {

        return $this->belongsToMany('App\Categories', 'store_category', 'store_id', 'category_id');
    }

}
