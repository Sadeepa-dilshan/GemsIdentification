<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'mobile', 'address'];

    public function gems()
    {
        return $this->hasMany(Gem::class);
    }
}
