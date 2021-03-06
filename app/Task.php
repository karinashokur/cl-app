<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStatus\HasStatuses;
class Task extends Model
{
    use HasStatuses;
    protected $fillable = [
         'name', 'priority', 'price'
     ];
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function task()
    {
        return $this->belongsTo('App\Task');
    }
    public function risks()
    {
        return $this->hasMany('App\Risk');
    }
    public function undertasks()
    {
        return $this->hasMany('App\Task');
    }
    public function date()
    {
        return $this->hasOne('App\Date');
    }
}
