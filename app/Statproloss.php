<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statproloss extends Model
{
    protected $table = "statproloss";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id', 'period', 'statproloss', 'user_id',
    ];


    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
