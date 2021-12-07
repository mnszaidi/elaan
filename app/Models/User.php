<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use HasApiTokens, HasFactory, HasRoles, SoftDeletes, LogsActivity, Notifiable;

    /**
     * User Course relation
     *
     * @var string[]
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    /**
     * User Course relation
     *
     * @var string[]
     */
    public function exames()
    {
        return $this->belongsToMany(Exam::class);
    }

    /**
     * User Course relation
     *
     * @var string[]
     */
    public function myassignments()
    {
        return $this->belongsToMany(AssignmentUser::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'fname',
        'lname',
        'username',
        'email',
        'password',
    ];

    /**
     * The Log.
     *
     * @var string[]
     */
    protected static $logAttributes = [
        'fname',
        'lname',
        'username',
        'email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
