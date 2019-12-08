<?php
namespace app\model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends \Illuminate\Database\Eloquent\Model {
    use SoftDeletes;
    protected $table = 'item';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $dates = ['deleted_at'];

    public function infoCommandeItem() {
        return $this->hasMany('\app\model\Carte', 'carte_id');
    }

    public function commandes() {
        return $this->belongsToMany('\app\model\Commande', "item_commande","item_id","commande_id")
            ->withPivot(['item_id','commande_id','quantite']);
    }
}