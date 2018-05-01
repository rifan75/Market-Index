<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finpos extends Model
{
    protected $table = "cashflow";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id', 'period', 'cashflow', 'user_id',
    ];


    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
