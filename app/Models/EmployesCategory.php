<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployesCategory extends Model
{
    use HasFactory;
    protected $table = 'employes_categories';
    protected $fillable = ['id', 'name'];

    // public function employes()
    // {
    //     return $this->hasMany(Employes::class, 'categori_id', 'id');
    // }
}
