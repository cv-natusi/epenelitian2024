<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  protected $table='menu';
  protected $primaryKey='id_menu';
  public $timestamps=false;
}
