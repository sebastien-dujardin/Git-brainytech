<?php

namespace App;
use User;
use Illuminate\Database\Eloquent\Model;

class entrepriseModel extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'infos_adresse_entreprise','infos_siret','infos_nom_entreprise','users_id'
    ];

    protected $table = 'infos_entreprise';
    protected $primaryKey = 'idinfos_entreprise';
    public $timestamps = false;
}
