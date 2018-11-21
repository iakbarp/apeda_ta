<?php
//
//namespace App;
//
//use Illuminate\Database\Eloquent\Model;
//
//class city extends Model
//{
//    protected $guarded=['id','created_at'];
//
//    public function DataCatagories(){
//        return $this->hasMany(trDataCategory::class,'job_id');
//    }
//    public function ps(){
//        return $this->hasMany('App\city','city_id','id');
//    }
//}

namespace App;

use Illuminate\Database\Eloquent\Model;

class village extends Model
{
    protected $table = 'villages';
//    protected $guarded=['id','created_at'];
    protected $primaryKey = 'id'; // or null

    public $incrementing = false;

}
