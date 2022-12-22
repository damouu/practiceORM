<?php

namespace app\model;

class Carte extends \Illuminate\Database\Eloquent\Model
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