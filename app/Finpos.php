<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finpos extends Model
{
    protected $table = "finpos";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id', 'period', 'finpos', 'user_id',
    ];


    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
