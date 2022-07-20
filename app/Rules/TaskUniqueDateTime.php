<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Task;

class TaskUniqueDateTime implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $date='';

    public function __construct($date)
    {
        $this->date=$date;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Task::uniqueDateTimeCount($this->date,$value)==0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'A task with same date and time already exists';
    }
}
