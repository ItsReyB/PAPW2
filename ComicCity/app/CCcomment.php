<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CCcomment extends Model
{
   	public function scopewithName($query, $postid){

        return $query->join('c_cusers','c_ccomments.user_id', 'c_cusers.id')->where('post_id', $postid);
    }
}
