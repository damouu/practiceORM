<?php
namespace app\model;


    class Item_commande extends \Illuminate\Database\Eloquent\Model {
        protected $table = 'item_commande';
        protected $primaryKey = 'item_id';
        public $timestamps = false;

        public function infoItem() {
            return $this->hasMany('\app\model\Item', 'id');
        }

        public function infoCommande() {
            return $this->hasMany('\app\model\Commande', 'id');
        }

}