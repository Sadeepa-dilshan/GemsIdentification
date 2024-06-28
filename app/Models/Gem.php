<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gem extends Model
{
    use HasFactory;

    protected $fillable = ['species', 'variety', 'shape_cutting_style', 'measurements', 'carat_weight', 'color','qr_code_path','transparency'];

    public function userDetail()
    {
        return $this->belongsTo(UserDetail::class);
    }
}
