<?php
include __DIR__.'/../config/database.php';
require_once __DIR__.'/../model/Uf.php';

class UfController{
    public function buscarTodas(){
        $ufs = Uf::all();
        return $ufs->toJson();
    }

}
