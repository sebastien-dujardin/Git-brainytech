<?php

namespace App;

use User;
use Illuminate\Database\Eloquent\Model;


class adresseModel extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'infos_adresse','infos_code_postal','infos_ville','users_id'
    ];

    protected $table = 'adresse';
    protected $primaryKey = 'infos_id_Adresse';
    public $timestamps = false;


}

