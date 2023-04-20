<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compliance extends Model
{
    use HasFactory;

    protected $dates = ['date'];

    protected $guarded = [];

    public $timestamps = true;

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'dealings_owner');
    }

    public function departament()
    {
        return $this->belongsTo(Departament::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
