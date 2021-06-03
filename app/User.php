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
    public function projects()
    {
        return $this->hasMany('App\Project');
    }
    public function companies()
    {
        return $this->belongsToMany('App\Company');
    }
    public function ownedCompanies()
    {
        return $this->hasMany('App\Company');
    }
    public function hasCompany()
    {
        return $this->ownedCompanies()->exists();
    }
    public function hasProjects()
    {
        return $this->projects()->exists();
    }
}
