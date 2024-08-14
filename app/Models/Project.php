<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'client_id',
        'notes',
    ];

    public function client()
    {
        return parent::belongsTo(User::class)->where('id',auth()->user()->id);
    }

    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }
}
