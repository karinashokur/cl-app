<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStatus\HasStatuses;
class Task extends Model
{
    use HasStatuses;
}
