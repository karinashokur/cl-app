<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Risk extends Model
{
    protected $fillable = [
      'name', 'seriousness'
    ];
    public function task()
    {
      return $this->belongsTo('Task');
    }
}
