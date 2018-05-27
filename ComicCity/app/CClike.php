<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CClike extends Model
{
    public function scopeSearch($query, $user, $post){
    	return $query->where([	['user_id',$user]	, ['post_id', $post]	]);
    }
    public function scopebyUser($query, $user){
    	return $query	->join('c_cposts','c_clikes.post_id', 'c_cposts.id')
    					->join('c_cgenres','c_cposts.genre_id', 'c_cgenres.id')
    					->where([	['c_clikes.user_id',$user]	, ['SN', true] ]);
    }
}
