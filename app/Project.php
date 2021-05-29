<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStatus\HasStatuses;
class Project extends Model
{
    use HasStatuses;
    protected $fillable = [
      'name', 'description', 'budget'
    ];
    public function tasks()
    {
      return $this->hasMany('App\Task');
    }
    public function owner()
    {
      return $this->belongsTo('App\User');
    }
    public function domains()
    {
      return $this->morphMany('App\Domain', 'domainable'); 
    }
}
