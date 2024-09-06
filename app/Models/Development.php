<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Development extends Model
{
    use HasFactory;

    protected $fillable = [
        'developer_id',
        'title',
        'status',
        'version',
        'feedback',
        'deadline',
        'code_repository_url',
        'description',
    ];

    public function developer()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function ($design) {
            $design->developer_id = Auth::user()->id;
        });
    }
}
