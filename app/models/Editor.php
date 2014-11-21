<?php

class Editor extends Eloquent {
    
    protected $table = 'editores';
    
    /*
     * Other
     */        
    public function scopeSearch($query, $term)
    {
        if(is_numeric($term))
        {
            return $query->where('id', $term);
        }
 
        return $query->where('editores.nome', 'like', '%'.$term.'%');    
    }    
}
