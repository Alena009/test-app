<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Display;

class DisplayController extends BaseController
{
    function __construct(Display $display) {
        parent::__construct($display);        
    }         
}
