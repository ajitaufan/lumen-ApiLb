<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Wishlist extends Model 
{
  public $table= "wishlist";
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
            ];
        
            public function wishlist(){
                return $this->belongsTo('App\Model\User', 'id_user');
            }
            public function wishlistb(){
                return $this->belongsTo('App\Model\Lovebird', 'id_burung');
            }
  }

