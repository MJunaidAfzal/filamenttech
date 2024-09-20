<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'service_id',
        'service_type',
        'notes',
    ];

    protected static function booted()
    {
        static::creating(function ($project) {
            if ($project->service_id) {
                $service = Service::find($project->service_id);
                if ($service) {
                    $project->service_type = $service->type;
                } else {
                    $project->service_type = null;
                }
            }

            do {
                $orderNumber = 'ODR-' . Str::upper(Str::random(6));
            } while (self::where('order_id', $orderNumber)->exists());

            $project->order_id = $orderNumber;
            $project->user_id = Auth::user()->id;
        });
    }

    public function assignees()
    {
        return $this->belongsToMany(User::class, 'order_assignees', 'order_id', 'user_id')
            ->whereHas('role', function ($query) {
                $query->where('id', 2);
            });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }



}
