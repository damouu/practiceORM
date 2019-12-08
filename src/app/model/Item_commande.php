<?php
namespace app\model;


    class Item_commande extends \Illuminate\Database\Eloquent\Model {
        protected $table = 'item_commande';
        protected $primaryKey = 'item_id';
        public $timestamps = false;
}