<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Parallax\FilamentComments\Models\Traits\HasFilamentComments;



class OrderDelivery extends Model
{
    use HasFactory;

    use HasFilamentComments;


    protected $fillable = [
        'delivery_files',
        'delivery_note',
        'status',
        'user_id',
        'order_id'
    ];

    protected function casts(): array
    {
        return [
            'delivery_files' => 'array',
        ];
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public  function order(): BelongsTo{
        return $this->belongsTo(Order::class,'order_id');
    }
}
