<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Customer extends Model
{
    protected $fillable = [
      'email', 'phone'
    ];
    public function project()
    {
      return $this->belongsTo('App\Project'); 
    }
}
