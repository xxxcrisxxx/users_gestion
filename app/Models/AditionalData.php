<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AditionalData extends Model
{
    use HasFactory;
    protected $table = "aditional_data";

    protected $fillable = [
        'user_id',
        'number_phone',
        'birth_date',
        'civil_status',
        'children',
        'observations'
    ];
}
