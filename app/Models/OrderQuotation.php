<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Auth;
use Str;
use Parallax\FilamentComments\Models\Traits\HasFilamentComments;


class OrderQuotation extends Model
{
    use HasFactory;

    use HasFilamentComments;


    protected $fillable = [
        'quotation_number',
        'order_id',
        'estimated_cost',
        'description',
        'deadline',
        'status',
        'notes',
        'created_by',
        'approved_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public  function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function approver()
    {
        return $this->order->user->name;
    }

    protected static function booted()
    {
        static::creating(function ($order) {
            // dd($order);
            do {
                $orderNumber = 'QUO-' . Str::upper(Str::random(6));
            } while (self::where('quotation_number', $orderNumber)->exists());

            $order->quotation_number = $orderNumber;
            $order->created_by = Auth::user()->id;
            $order->order_id = $order->order ? $order->order->id : null;
        });
    }
}
