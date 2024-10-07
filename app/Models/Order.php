<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Parallax\FilamentComments\Models\Traits\HasFilamentComments;

class Order extends Model
{
    use HasFactory;

    use HasFilamentComments;



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

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'customer_orders', 'order_id', 'customer_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function design() {
        return $this->hasOne(Design::class, 'project_id');
    }

    public function development() {
        return $this->hasOne(Development::class, 'project_id');
    }

    public function quotations(): HasMany
    {
        return $this->hasMany(OrderQuotation::class);
    }



    // public function permissions(): BelongsToMany
    // {
    //     return $this->belongsToMany(Permission::class, 'role_has_permissions', 'role_id', 'permission_id');
    // }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function orderDeliveries()
    {
        return $this->hasMany(OrderDelivery::class);
    }

}
