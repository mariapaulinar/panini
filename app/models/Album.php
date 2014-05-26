<?php

/* 
 * Modelo para la tabla albums.
 */

class Album extends Eloquent {
    protected $fillable = array('name', 'description', 'year');
    
    public function sections(){
        return $this->hasMany('Section', 'albumid');
    }
}

