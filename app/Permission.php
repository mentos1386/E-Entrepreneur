<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'role_id',

        // Backend
        'dashboard',
        'dashboard_users',
        'dashboard_blog_posts',
        'dashboard_blog_comments',
        'dashboard_statistics',
        'dashboard_store_add',
        'dashboard_store_orders',
        'dashboard_settings_tools',
        'dashboard_appearance',
        'dashboard_pages',

        // Frontend
        'user_comments_post',
        'user_store_buy',
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
