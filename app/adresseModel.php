<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adresseModel extends Model
{
    protected $table = 'adresse';
    protected $primaryKey = 'infos_id_Adresse';
    public $timestamps = false;
}
