<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equitypos extends Model
{
    protected $table = "equitypos";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id', 'period', 'equitypos', 'user_id',
    ];


    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
