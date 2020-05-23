<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{

    protected $table = 'donation_request';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_phone', 'patient_age', 'hospital_name', 'bags_num', 'hospital_address', 'details', 'latitude', 'longitude', 'city_id', 'blood_type_id', 'client_id');

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function Notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

}
