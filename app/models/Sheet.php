<?php

/* 
 * Modelo para la tabla sheets.
 */

class Sheet extends Eloquent {
    protected $fillable = array('sectionid', 'image', 'content', 'sectionid');
    
}