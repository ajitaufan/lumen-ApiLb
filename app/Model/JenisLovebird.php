<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class JenisLovebird extends Model 
{
  public $table= "jenis_lovebird";
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
            ];
        
          public function jenislovebird(){
            return $this->belongsTo('App\Model\Lovebird');
        }
        
  }

