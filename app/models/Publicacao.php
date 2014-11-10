<?php

class Publicacao extends Eloquent {

    protected $table = 'publicacoes';
    
    public $timestamps = false;
    
    // Relacionamento - usuário
    public function usuario()
    {
        return $this->belongsTo('User');
    }
    
    // Validação
    public function validate($input) 
    {
        $rules = array(
            'titulo' => 'required|max:100',
        );
        
        return Validator::make($input, $rules);
    }
    
    /*
     * Other
     */        
    public function scopeSearch($query, $term)
    {
        if(is_numeric($term))
        {
            return $query->where('id', $term);
        }
 
        return $query->where('publicacoes.nome', 'like', '%'.$term.'%');    
    }    
}