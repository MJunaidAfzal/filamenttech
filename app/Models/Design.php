<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Design extends Model
{
    use HasFactory;

    protected $fillable = [
        'designer_id',
        'project_id',
        'title',
        'category_id',
        'status',
        'file',
        'deadline',
        'description',
    ];

    public function designer()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function ($design) {
            $design->designer_id = Auth::user()->id;
        });
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
