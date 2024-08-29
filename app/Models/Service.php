<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name','status','icon'];
    
    public function getName(): array
    {
        return json_decode($this->name, true);
    }
}
