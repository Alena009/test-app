<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reseller;

class ResellerController extends BaseController
{
    function __construct(Reseller $reseller) {
        parent::__construct($reseller);        
    }     
}
