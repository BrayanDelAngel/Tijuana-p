<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Staudenmeir\EloquentParamLimitFix\ParamLimitFix;

class cobranzaExternaHistoricos extends Model
{
  
    protected $table = 'cobranzaExternaHistoricosWS3';
    public $timestamps = false;
}
