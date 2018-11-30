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

class city extends Model
{

    protected $guarded = ['id', 'created_at'];

    public static function replace($id, $data)
    {
        if ($city = city::find($id)) {
            $city->update($data);
            return $city;
        }
    }

}
