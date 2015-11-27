<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VolunteerBean
 * @package App\Model
 * @mixin \Eloquent
 */
class VolunteerBean extends Model
{
    //
    protected $table = 'volunteer_beans';

    protected $dates = ['created_at', 'updated_at', 'valid_time', 'action_at'];

    protected function activityBeanRate()
    {
        return $this->belongsTo('App\Model\ActivityBeanRate', 'bean_rate_id');
    }
}
