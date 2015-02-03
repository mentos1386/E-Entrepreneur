<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permission';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_edit',
        'comments_post',
        'comments_moderate',
        'statistics_view',
        'store_buy',
        'store_add',
        'store_orders',
        'settings_edit',
        'posts_create',
        /**
         * TODO: Do i need this below?
         */
        'posts_publish',
    ];

    /**
     *  Belongs to one Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(){

        return $this->belongsTo('App\Role');
    }

}
