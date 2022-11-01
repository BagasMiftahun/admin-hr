<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employes extends Model
{
    use HasFactory;

    protected $table = 'employes';
    protected $fillable = [
        'categori_id',
        'name',
        'salary'
    ];

}
