<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'api_token', 'webhook_token', 'website_url', 'custom_uri'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'api_token', 'webhook_token', 'custom_uri'
    ];

    /**
     * Get the balances for the user.
     */
    public function balance()
    {
        return $this->hasMany('App\UserBalance');
    }

    /**
     * Get the api calls for the user.
     */
    public function apicall()
    {
        return $this->hasMany('App\ApiCall');
    }

    /**
     * Get the payments for the user.
     */
    public function payment()
    {
        return $this->hasMany('App\Payment');
    }

    /**
     * Get the withdraws for the user.
     */
    public function withdraw()
    {
        return $this->hasMany('App\Withdraw');
    }
}
