<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function compliances()
    {
        return $this->hasMany(Compliance::class);
    }
}
