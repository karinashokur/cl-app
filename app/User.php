<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $fillable = [
        'name', 'email', 'lastname', 'phone', 'password'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function tariff()
    {
        return $this->hasOne('App\Tariff');
    }
}
