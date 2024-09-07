<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Str;

class Project extends Model
{
    use HasFactory;


    protected $fillable = [
        'order_id',
        'title',
        'description',
        'deadline',
        'file',
        'no_of_pages',
        'status',
        'price',
        'user_id',
        'notes',
        'developer_id',
        'payment_status',
        'service_id',
        'service_type',
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
        static::creating(function ($project) {
            do {
                $orderNumber = 'ODR-' . Str::upper(Str::random(6));
            } while (self::where('order_id', $orderNumber)->exists());

            $project->order_id = $orderNumber;
            $project->user_id = Auth::user()->id;
        });
    }

    public function setServiceIdAttribute($value)
    {
        $this->attributes['service_id'] = $value;
        $this->attributes['service_type'] = $this->getServiceType($value);
    }

    protected function getServiceType($serviceId)
    {
        $models = [
            'development' => 'App\\Models\\Development',
            'design' => 'App\\Models\\Design',
        ];

        return $models[$serviceId] ?? null;
    }




}
