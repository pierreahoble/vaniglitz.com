<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    protected $fillable = [
            'nom',
            'email', 
            'numero',
            'adresse',
           'heure',
            'logo'
    ];




    
}
