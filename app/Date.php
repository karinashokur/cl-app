<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Date extends Model
{
    protected $fillabe = [
      'start_date',
      'expected_end_date',
      'end_date'
    ];
    public function project()
    {
      return $this->belongsToOne('App\Project');
    }
    public function task()
    {
      return $this->belongsToOne('App\Task'); 
    }
}
