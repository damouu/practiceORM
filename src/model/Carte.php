<?php

namespace src\model;

use Illuminate\Database\Eloquent\Model;

class Carte extends Model
{
    protected $table = 'carte';
    protected $primaryKey = 'id';

    public $timestamps = true;

    public $incrementing = false;
    public $keyType = 'string';

    public function commandesCarte()
    {
        return $this->hasMany('\app\model\Commande', 'carte_id');
    }
}