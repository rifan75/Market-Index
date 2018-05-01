<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "company";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'symbol','id_marketindex', 'name', 'address', 'state', 'province', 'district', 'poscode', 'weburl', 'note', 'user_id',
    ];


    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function marketindex()
    {
        return $this->belongsTo('App\Marketindex','id_marketindex','id');
    }
}
