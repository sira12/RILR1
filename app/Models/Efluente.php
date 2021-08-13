<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Efluente extends Model
{
    use HasFactory;


    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'efluente';

   /**
    * The primary key associated with the table.
    *
    * @var string
    */
   protected $primaryKey = 'id_efluente';

   /**
    * Indicates if the model should be timestamped.
    *
    * @var bool
    */
   public $timestamps = false;
}
