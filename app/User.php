<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'avatar', 'initials',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * get roles
     */
    public function roles()
    {
        return $this
            ->belongsToMany('App\Role')
            ->withTimestamps();
    }

    /**
     * Check  authorize Roles
     */
    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        return redirect('/login');
    }
    /**
     * Check  has any Role
     */
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Check  has Role
     */
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    /**
     * Get Role
     */
    public function role()
    {
        return $this->roles[0]->name;
    }

    /**
     * Get Role id
     */
    public function role_id()
    {
        return $this->roles()->first()->id;
    }


    public function project_user()
    {
        return $this->belongsToMany('App\Project', 'project_user');
    }

    public function projects()
    {
        return $this->belongsToMany('App\Project')->where('status_id', '!=', 9)->where('status_id', '!=', 1)->withTimestamps();
    }

    /**
     * Check project user
     */

    public function isProjectUser($project_id)
    {

        if ($this->projects()->where('project_id', $project_id)->first()) {
            return true;
        }
        return false;
    }
}
