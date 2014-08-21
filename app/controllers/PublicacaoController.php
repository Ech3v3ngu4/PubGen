<?php

class PublicacaoController extends BaseController{
    
    public function getIndex()
    {
        $titulo = 'Publicações';
        
        $pesquisa = Input::get('pesquisa');
        
        if($pesquisa)
        {
            $publicacoes = Publicacao::search($pesquisa)->
                    paginate(Config::get('additional.pagination_count', 10));
        }
        else
        {
            $publicacoes = Publicacao::paginate(Config::get('additional.pagination_count', 10));
        }
        
        return View::make('publicacoes/lista', compact('titulo', 'publicacoes', 'pesquisa'));
    }
         
    public function getCriar()
    {
        $titulo = 'Criar Publicação';
        
        $publicacao = new Publicacao;
                
        return View::make('publicacoes/criar', compact('titulo', 'publicacao'));
    }
    
    public function postCriar()
    {
         // New element
        $publicacao = new Publicacao;
            
        // Validation
        $validator = $publicacao->validate(Input::all());

        if ($validator->passes())
        {
            $publicacao->nome = Input::get('nome');
            
            $publicacao->save();
            
            return Redirect::to('/');
        }
        
        return Redirect::to('publicacoes/criar/')->
                withErrors($validator)->
                withInput();
    }
    
    public function getEditar($id)
    {
        $titulo = 'Editar Publicação';
        
        $publicacao = Publicacao::find($id);
        
        return View::make('publicacoes/editar', compact('titulo', 'publicacao'));
    }
    
    public function postEditar()
    {
         // Edit element
        $publicacao = Publicacao::find(Input::get('id'));
            
        // Validation
        $validator = $publicacao->validate(Input::all());

        if ($validator->passes())
        {
            $publicacao->nome = Input::get('nome');
            
            $publicacao->save();
            
            return Redirect::to('/');
        }
        
        return Redirect::to('publicacoes/editar/' . Input::get('id'))->
                withErrors($validator)->
                withInput();
    }
    
    public function getRemover($id)
    {
        $titulo = 'Remover Publicação?';
        
        $publicacao = Publicacao::find($id);
        
        return View::make('publicacoes/remover', compact('titulo', 'publicacao'));
    }
    
    public function postRemover()
    {
        $publicacao = Publicacao::find(Input::get('id'));
        
        $publicacao->delete();
        
        return Redirect::to('/');
    }
}