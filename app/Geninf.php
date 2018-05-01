<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Geninf extends Model
{
    protected $table = "geninf";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id', 'period', 'geninf', 'user_id',
    ];


    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
