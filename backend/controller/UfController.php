<?php
require_once __DIR__.'/../model/model/UfQuery.php';
class UfController
{
    public function buscarTodasUfs()
    {
        $ufs = \model\model\UfQuery::create()->find();

    }

}