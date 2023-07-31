<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $guarded = ['id'];

    public function invoice(){
        // kelas_id adalah foreignkey tbl user, id primary_key tbl kelas
        return $this->hasMany(Invoice::class, 'user_id', 'id');
    }

    // public function kelas(){
    //     // kelas_id adalah foreignkey tbl user, id primary_key tbl kelas
    //     return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    // }

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
