<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function scopeGetTask($query,$columnName='created_at',$order='asc')
    {
            return $query->orderBy($columnName, $order)->get();
    }

    public function scopeDeleteSingleTask($query,$columnValue,$columnName='id')
    {
            return $query->where($columnName,$columnValue)->first()->delete();
    }
    
    public function scopeDeleteAllTask($query,$columnValue,$columnName='id')
    {
            return $query->where($columnName, $columnValue)->delete();
    }

    public function scopeEmptyTaskList($query)
    {
            return $query->delete();
    }
}
