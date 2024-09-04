<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_of_pages',
        'website_name',
        'reference',
        'reference_link',
        'document_attachment',
    ];
}
