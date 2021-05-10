<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password',
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
    public function hasProjects()
    {
        return $this->projects()->exists();
    }
    public function hasCompany()
    {
        return $this->ownedCompanies()->exists();
    }
}
