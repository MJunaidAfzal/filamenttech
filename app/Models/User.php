<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasRoles;

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'country_id',
        'phone_number',
        'company_name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class)->whereIn('name', ['developer', 'support', 'client']);
    }

    public function isRole()
    {
        return auth()->user()->role->name;
    }
    public function IsClient()
    {
        return $this->role_id === 4;
    }

    public function isAdmin()
{
    return $this->role_id === 1;
}

public function isDeveloper()
{
    return $this->role_id === 2;
}

public function isSupport()
{
    return $this->role_id === 3;
}

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function projects()
{
    return $this->belongsToMany(Project::class, 'project_assignees', 'user_id', 'project_id');
}


public function permissions()
{
    return $this->belongsToMany(Permission::class, 'role_has_permissions', 'role_id', 'permission_id');
}

public function hasPermissionTo($permission)
{
    return $this->permissions()->where('name', $permission)->exists();
}
}
