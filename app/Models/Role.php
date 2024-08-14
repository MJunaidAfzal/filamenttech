<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name','guard_name','permission_id'];


    public function permission()
    {
        return $this->belongsto(Permission::class);
    }
}
