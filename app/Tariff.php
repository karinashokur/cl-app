<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Tariff extends Model
{
    protected $fillable = [
      'technical_level', 'price', 'user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
