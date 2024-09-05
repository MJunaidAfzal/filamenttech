<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Project extends Model
{
    use HasFactory;


    protected $fillable = [
        'order_id',
        'name',
        'description',
        'deadline',
        'file',
        'project_type_id',
        'no_of_pages',
        'status',
        'price',
        'user_id',
        'notes',
        'developer_id',
        'platform_id',
        'category_id',
    ];

    public function user()
    {
        return parent::belongsTo(User::class)->where('role_id',2);
    }

    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }

    protected static function booted()
    {
        static::creating(function ($order) {
            do {
                $orderNumber = 'ODR-' . Str::upper(Str::random(6));
            } while (self::where('order_id', $orderNumber)->exists());

            $order->order_id = $orderNumber;
        });
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    public function category()
    {
        return $this->belongsTo(GraphicDesign::class);
    }



}
