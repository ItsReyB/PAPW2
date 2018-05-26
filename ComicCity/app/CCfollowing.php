<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CCfollowing extends Model
{
    public function scopeSearch($query, $er, $ed){
    	return $query->where([	['follower_id',$er]	, ['followed_id', $ed]	]);
    }
    public function scopebyUser($query, $er){
    	return $query->join('c_cposts','c_cfollowings.follower_id', 'c_cposts.user_id')
    	->where([	['follower_id',$er]	, ['SN', true] ]);
    }
}
