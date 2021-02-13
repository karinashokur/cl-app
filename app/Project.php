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
      return $this->hasMany('Task');
    }
    public function owner()
    {
      return $this->belongsTo('User');
    }
}
