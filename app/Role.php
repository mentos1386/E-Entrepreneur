<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'comment', 'permissions_id' ];

    /**
     *  One Role can be Assigned to Many Users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user(){

        return $this->hasMany('App\User');
    }

    /**
     *  There can be One Permission "list" for every role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function permission(){

        return $this->hasOne('App\Permission');
    }

}
