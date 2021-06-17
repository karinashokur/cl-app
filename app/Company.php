<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Company extends Model
{
    protected $fillable = [
      'name', 'address', 'phone', 'email'
    ];
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function tariffs()
    {
        return $this->hasMany('App\Tariff');
    }
}
