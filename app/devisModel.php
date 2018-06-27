<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class devisModel extends Model
{
    protected $table = 'devis';
    protected $primaryKey = 'id_numero_Devis';
    public $timestamps = false;
}
