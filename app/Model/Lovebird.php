<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Lovebird extends Model 
{
  public $table= "lovebird";
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
       'warna','tanggal_lahir','jenis_kelamin','umur','harga','dijual','status','deskripsi','id_user'
          ];
        
          public function lovebird(){
            return $this->belongsTo('App\Model\User', 'id_user');
        }
        public function jenislovebird(){
            return $this->hasOne('App\Model\JenisLovebird','id','idjenis_lovebird');
        }
        public function image(){
            return $this->hasOne('App\Model\Image','id_lovebird');
        }

        public function wishlistb(){
            return $this->hasMany('App\Model\Wishlist', 'id_burung','id');
        }
  }

