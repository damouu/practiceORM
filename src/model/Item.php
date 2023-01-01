<?php

namespace src\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $table = 'item';
    protected $primaryKey = 'id';

    public $timestamps = false;

    public $incrementing = false;
    public $keyType = 'string';

    protected $dates = ['deleted_at'];

    public function infoCommandeItem(): HasMany
    {
        return $this->hasMany('\app\model\Carte', 'carte_id');
    }

    public function commandes()
    {
        return $this->belongsToMany('\app\model\Commande', "item_commande", "item_id", "commande_id")
            ->withPivot(['item_id', 'commande_id', 'quantite']);
    }
}