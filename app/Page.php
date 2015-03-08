<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'content', 'url', 'pagetypes_id', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     *  One Page can be Assigned to Many Roles [Permission to access]
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function role()
    {
        return $this->belongsToMany('App\Role', 'page_role', 'page_id', 'role_id');
    }

    /**
     *  One Page can be Assigned to Many Users [Permission to access]
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user()
    {
        return $this->belongsToMany('App\User', 'page_user', 'page_id', 'user_id');
    }

    /**
     *  One page can have one pagetype
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pagetypes()
    {
        return $this->belongsTo('App\Pagetypes');
    }

}
