<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraphicDesign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'file',
        'format',
        'size',
        'revision',
        'concept',
    ];
}
