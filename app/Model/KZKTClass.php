<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KZKTClass extends Model
{
    protected $table = 'kzkt_classes';

    protected function volunteer()
    {
        return $this->belongsTo('App\Model\Volunteer', 'volunteer_id');
    }

}
