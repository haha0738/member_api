<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class member extends Model {

	protected $fillable = ['pid', 'username', 'password', 'status'];
	public function profile()
    {
        return $this->hasOne('App\member_profiles', 'uid');
    }

    public function credit()
    {
    	return $this->hasOne('App\member_credits', 'uid');	
    }

    public function percent()
    {
    	return $this->hasOne('App\member_percents', 'uid');		
    }

}
