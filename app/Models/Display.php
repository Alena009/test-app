<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Display extends Model
{
    use HasFactory;
    
    public $guarded = [];
    
    public function reseller()
    {
        return $this->belongsTo(Reseller::class);
    }       
}
