<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {
    use HasFactory;

    public static function search() {
        return Task::orderBy('created_at', 'asc')->get();
    }

    public static function store( $request) {
        $task = new Task;
        $task->name = $request->name;
        $task->save();
    }
}
