<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentasYFacturacion extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'destino_ventas';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_destino_ventas';

    

    public function destinoProvincia()
    {
        return $this->hasMany(DestinoProvincia::class,'id_destino_ventas')->join('provincia','rel_destino_ventas_provincia.id_provincia','provincia.id_provincia');
    }

    public function destinoPais()
    {
        return $this->hasMany(DestinoPais::class,'id_destino_ventas')->join('pais','rel_destino_ventas_pais.id_pais','pais.id_pais');
    }
}
