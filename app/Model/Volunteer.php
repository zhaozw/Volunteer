<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Volunteer
 * @package App\Model
 * @mixin \Eloquent
 */
class Volunteer extends Model
{
    protected $table = 'volunteers';

    protected function unit()
    {
        return $this->BelongsTo('App\Model\Unit', 'unit_id');
    }

    protected function beans()
    {
        return $this->hasMany('App\Model\VolunteerBean', 'volunteer_id');
    }
}
