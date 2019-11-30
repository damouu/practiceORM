<?php
namespace app\model;

class Commande extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'commande';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function infocarte() {
        return $this->belongsTo('\app\model\Carte', 'carte_id');
    }

    protected $fillable = ['id','created_at','updated_at','date_livraison','montant','etat','nom_client','carte_id',];

    public function item() {
        return $this->hasMany('\app\model\item', 'carte_id');
    }

    public function listItem() {
        return $this->belongsToMany('\app\model\Item', 'item_commande','commande_id','item_id');
    }
}