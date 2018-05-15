<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CCpost extends Model
{
 	public function scopeTitle($query, $StrSrch){

        return $query->where('ComicTitle', 'LIKE',$StrSrch);
    }
    public function scopeNews($query){

        return $query->orderBy('created_at', 'DESC');
    }
    public function scopeofUser($query, $id){

        return $query->where('user_id', $id)->orderBy('created_at', 'DESC');
    }
    public function scopeTop($query){

        return $query->orderBy('stars', 'DESC');
    }
}
