<?php

class Autor extends Eloquent {
    
    protected $table = 'autores';

    /*
     * Other
     */        
    public function scopeSearch($query, $term)
    {
        if(is_numeric($term))
        {
            return $query->where('id', $term);
        }
 
        return $query->where('autores.nome', 'like', '%'.$term.'%');    
    }    
}