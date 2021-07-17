<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Customer extends Model
{
    protected $fillable = [
      'email', 'phone', 'name'
    ];
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
