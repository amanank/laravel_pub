<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'due_date',
        'due_time',
    ];

    public function scopeGetAll($query,$columnName='created_at',$order='asc')
    {
            return $query->orderBy($columnName, $order)->get();
    }

    public function scopeDeleteSingle($query,$columnValue,$columnName='id')
    {
            return $query->where($columnName,$columnValue)->first()->delete();
    }
    
    public function scopeDeleteMany($query,$columnValue,$columnName='id')
    {
            return $query->where($columnName, $columnValue)->delete();
    }

    public function scopeEmptyList($query)
    {
            return $query->delete();
    }
}
