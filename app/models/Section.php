<?php

/* 
 * Modelo para la tabla sections.
 */

class Section extends Eloquent {
    protected $fillable = array('albumid', 'order', 'name', 'sheets');
    
    public function sheets(){
        return $this->hasMany('Sheet', 'sectionid');
    }
}