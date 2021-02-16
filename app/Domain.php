<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Domain extends Model
{
    protected $fillable [
      'name', 'type'
    ];
    public function project()
    {
      return $this->belongsTo('Project');
    }
    public function fieldOfExpertize()
    {
      return $this->belongsTo('User'); 
    }
}
