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
        return $this->belongsTo(User::class, 'user_id');
    }

    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }

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
        return $this->belongsToMany(User::class, 'project_assignees', 'project_id', 'user_id')
            ->whereHas('role', function ($query) {
                $query->where('id', 2);
            });
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

//

}
