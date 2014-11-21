<?php

class Publicacao extends Eloquent {

    protected $table = 'publicacoes';
        
    // Relacionamento - usuário
    public function usuario()
    {
        return $this->belongsTo('User');
    }
    
    public function autores()
    {
        return $this->hasMany('Autor');
    }
    
    public function editores()
    {
        return $this->hasMany('Editor');
    }
    
    // Validação
    public function validate($input) 
    {
        $rules = array(
            'titulo' => 'required|max:100',
            'titulo_periodico' => 'required|max:100',
            'editora' => 'required|max:255',
            'num_paginas' => 'required|integer',
            'ano' => 'required|integer',
        );
        
        $messages = array(
                'titulo.required' => 'O campo Título deve ser preenchido.',
                'titulo_periodico.required'     => 'O campo Título do periódico deve ser preenchido.',
                'editora.required'              => 'O campo Editora deve ser preenchido.',
                'num_paginas.required'          => 'O campo Número de páginas deve ser preenchido.',
                'ano.required'       => 'O campo Ano de Publicação deve ser preenchido.',
                'num_paginas.integer'           => 'O campo Número de páginas deve ser um número.',
                'ano.integer'        => 'O campo Ano de Publicação deve ser um ano.'
            );
        
        return Validator::make($input, $rules, $messages);
    }
    
    /*
     * Other
     */        
    public function scopeSearch($query, $term)
    {
        if(is_numeric($term))
        {
            return $query->where('id', $term)->orWhere('publicacoes.ano_publicacao', 'like', '%'.$term.'%');
        }
 
        return $query->where('publicacoes.titulo', 'like', '%'.$term.'%')->
                orWhere('publicacoes.editora', 'like', '%'.$term.'%')->
                orWhere('publicacoes.ano_publicacao', 'like', '%'.$term.'%');
    }    
    
    public function scopeSearchUser($query, $term)
    {
        if(is_numeric($term))
        {
            return $query->where('id', $term)->orWhere('publicacoes.ano_publicacao', 'like', '%'.$term.'%')->where('publicacoes.usuario_id', Auth::user()->id);
        }
 
        return $query->where('publicacoes.titulo', 'like', '%'.$term.'%')->
                orWhere('publicacoes.editora', 'like', '%'.$term.'%')->
                orWhere('publicacoes.ano_publicacao', 'like', '%'.$term.'%')->
                where('publicacoes.usuario_id', Auth::user()->id);
    } 
}