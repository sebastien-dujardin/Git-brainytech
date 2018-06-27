<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class factureModel extends Model
{
     protected $table = 'factures';
    protected $primaryKey = 'infos_idfacture';
    public $timestamps = false;
}
