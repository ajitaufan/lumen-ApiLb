<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model 
{
  public $table= "user";
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
        
          ];
          public function setPasswordAttribute($value){
            if (Hash::needsRehash($value)) {
              $this->attributes['password'] = Hash::make($value); 
            }else{
              $this->attributes['password'] = $value; 
            }
          }
          public function lovebird(){
            return $this->hasMany('App\Model\Lovebird', 'id_burung','id');
        }
        public function wishlist(){
          return $this->hasMany('App\Model\Wishlist', 'id_user','id');
      }
          
  }