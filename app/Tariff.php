<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Tariff extends Model
{
    protected $fillable = [
      'technical_level', 'price'
    ];
    public function company()
    {
      return $this->belongsTo('Company'); 
    }
}
