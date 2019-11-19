<?php
namespace app\model;

class Paiement extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'paiement';
    protected $primaryKey = 'ref_paiement';
    public $timestamps = false;
}