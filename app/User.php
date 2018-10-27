<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at'];
//    protected $dates = ['deleted_at'];
//    protected $fillable = ['verifyToken'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\status', 'role_id');
    }
    public function cities()
    {
        return $this->belongsTo('App\city', 'city_id');
    }
    public function status()
    {
        return $this->belongsTo('App\user', 'status');
    }

    public function jobs()
    {
        return $this->belongsTo(trDataJobDesc::class, 'job_id');
    }

    public function posisitions()
    {
        return $this->belongsTo(trDataPosisition::class, 'posisition_id');
    }
    public function mstdata()
    {
        return $this->hasMany('App\mst_data','category_id')->withTrashed();
    }
    public function verification()
    {
        return $this->hasOne('App\verifyUser', 'user_id');
    }

}
