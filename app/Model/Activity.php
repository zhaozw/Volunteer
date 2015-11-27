<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Activity
 * @package App\Model
 * @mixin \Eloquent
 */
class Activity extends Model
{
    protected $table = 'activitys';

    protected function unit()
    {
        return $this->hasOne('App\Model\Unit');
    }
}
