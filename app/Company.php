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
      return $this->hasMany('App\User');
    }
    public function tarification()
    {
      return $this->hasMany('App\Tariff');
    }
}
