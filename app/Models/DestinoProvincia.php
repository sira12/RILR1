<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinoProvincia extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rel_destino_ventas_provincia';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_rel_destino_ventas_provincia';

    public function provincia()
    {
        return $this->hasOne(Provincia::class,'id_provincia');
    }
 
}
