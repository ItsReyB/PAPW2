<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CCfollowing extends Model
{
    public function scopeSearch($query, $er, $ed){
    	return $query->where([	['follower_id',$er]	, ['followed_id', $ed]	]);
    }
    public function scopebyUser($query, $er){
    	return $query	->join('c_cposts','c_cfollowings.followed_id', 'c_cposts.user_id')
    					->join('c_cusers','c_cfollowings.followed_id', 'c_cusers.id')
    					->where([	['follower_id',$er]	, ['SN', true] ])
			->select(   'c_cposts.id', 
                        'ComicTitle', 
                        'ComicNum',
                        'c_cusers.id as user_id',
                        'c_cusers.name as user_name',
                        'genre_id',
                        'CoverImage',
                        'stars');
    }
}
