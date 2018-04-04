<?php

namespace App\gestion;

use App\Emi;

class PaginationGestion
{

    protected $emission;

    public function __construct(Emi $emission)
    {
        $this->emission = $emission;
    }


    public function getPaginate($n)
    {
        return $this->emission->paginate($n);
    }



}