<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';

    protected function hospital()
    {
        return $this->belongsTo('App\Model\Hospital', 'hospital_id');
    }
}
