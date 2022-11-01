<?php

namespace App\Models;

use App\Models\Data;
use App\Models\Attendance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Data extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'time',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'code', 'id');
    }


}
