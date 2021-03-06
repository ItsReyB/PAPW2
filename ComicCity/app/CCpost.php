<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CCpost extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('active', function ($query) {
            $query->where('c_cposts.Active', true);
        });
    }
    public function scopewithUser($query){
        return $query->join('c_cusers','c_cposts.user_id', 'c_cusers.id')
            ->select(   'c_cposts.id', 
                        'ComicTitle', 
                        'ComicNum',
                        'c_cusers.id as user_id',
                        'c_cusers.name as user_name',
                        'genre_id',
                        'CoverImage'
                    );
    }
 	public function scopeTitle($query, $StrSrch){

        return $query->join('c_cusers','c_cposts.user_id', 'c_cusers.id')
            ->select('c_cposts.id', 
                        'ComicTitle', 
                        'ComicNum',
                        'c_cusers.id as user_id',
                        'c_cusers.name as user_name',
                        'CoverImage',
                        'stars')
        ->where('ComicTitle', 'LIKE',$StrSrch);
    }
    public function scopeNews($query){

        return $query->orderBy('created_at', 'DESC');
    }
    public function scopeofUser($query, $id){

        return $query->where('user_id', $id)->orderBy('created_at', 'DESC');
    }
    public function scopeTop($query){
        return $query->join('c_cusers','c_cposts.user_id', 'c_cusers.id')
            ->select('c_cposts.id', 
                        'ComicTitle', 
                        'ComicNum',
                        'c_cusers.id as user_id',
                        'c_cusers.name as user_name',
                        'genre_id',
                        'CoverImage',
                        'stars')
            ->orderBy('stars', 'DESC');
    }
    public function scopeCategoria($query, $Categoria){

        return $query->join('c_cgenres','c_cposts.genre_id', 'c_cgenres.id')
                    ->join('c_cusers','c_cposts.user_id', 'c_cusers.id')
        ->select('c_cposts.id', 
                        'ComicTitle', 
                        'ComicNum',
                        'c_cusers.id as user_id',
                        'c_cusers.name as user_name',
                        'genre_id',
                        'CoverImage',
                        'stars')
        ->where('c_cgenres.genre', $Categoria);
    }

    public function scopeFilterKey($query, $StrSrch, $from, $to){
        return $query->join('c_cusers','c_cposts.user_id', 'c_cusers.id')
            ->select('c_cposts.id', 
                        'ComicTitle', 
                        'ComicNum',
                        'c_cusers.id as user_id',
                        'c_cusers.name as user_name',
                        'CoverImage',
                        'stars')
        ->where('ComicTitle', 'LIKE',$StrSrch)
        ->whereBetween('c_cposts.created_at', [$from, $to]);
    }
    public function scopeFilterKeyA($query, $StrSrch, $from, $to){
        return $query->join('c_cusers','c_cposts.user_id', 'c_cusers.id')
            ->select('c_cposts.id', 
                        'ComicTitle', 
                        'ComicNum',
                        'c_cusers.id as user_id',
                        'c_cusers.name as user_name',
                        'CoverImage',
                        'stars')
        ->where('writer', 'LIKE',$StrSrch)
        ->whereBetween('c_cposts.created_at', [$from, $to]);
    }
    public function scopeFilterKeyU($query, $StrSrch, $from, $to){
        return $query->join('c_cusers','c_cposts.user_id', 'c_cusers.id')
            ->select('c_cposts.id', 
                        'ComicTitle', 
                        'ComicNum',
                        'c_cusers.id as user_id',
                        'c_cusers.name as user_name',
                        'CoverImage',
                        'stars')
        ->where('c_cusers.name', 'LIKE',$StrSrch)
        ->whereBetween('c_cposts.created_at', [$from, $to]);
    }

    public function scopeFilterCat($query, $Categoria, $from, $to){
        return $query->join('c_cgenres','c_cposts.genre_id', 'c_cgenres.id')
                    ->join('c_cusers','c_cposts.user_id', 'c_cusers.id')
            ->select('c_cposts.id', 
                        'ComicTitle', 
                        'ComicNum',
                        'c_cusers.id as user_id',
                        'c_cusers.name as user_name',
                        'CoverImage',
                        'stars')
        ->where('c_cgenres.genre', $Categoria)
        ->whereBetween('c_cposts.created_at', [$from, $to]);
    }
}
