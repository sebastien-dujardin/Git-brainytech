<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jeuModel extends Model
{
          /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_jeu','users_id'
    ];

    protected $table = 'jeu';
    protected $primaryKey = '';
    public $timestamps = false;
}
