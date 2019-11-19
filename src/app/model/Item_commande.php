<?php
namespace app\model;


    class Item_commande extends \Illuminate\Database\Eloquent\Model {
        protected $table = 'item_commande';
        protected $primaryKey = 'item_id';
        public $timestamps = false;


        public function currentBorrows() {
            return $this->hasMany('\app\model\Document', 'id_membre');
        }

        public function allBorrows() {
            return $this->hasMany('\app\model\Emprunt', 'id_membre');
        }
}