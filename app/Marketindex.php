<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marketindex extends Model
{
    protected $table = "marketindex";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'index_symbol', 'index_name', 'symbol', 'address', 'state', 'province', 'district', 'poscode', 'weburl', 'note', 'user_id',
    ];


    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
