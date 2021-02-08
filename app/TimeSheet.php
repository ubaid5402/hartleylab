<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSheet extends Model
{
    protected $table = 'employee_timesheet';
    protected $primaryKey = 'timesheet_id';
}
