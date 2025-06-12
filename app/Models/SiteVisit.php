<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteVisit extends Model
{
    // Permite atribuição em massa para a coluna 'count'
    protected $fillable = ['count'];

    // Desativa timestamps se não quiser usá-los
    public $timestamps = true;
}
