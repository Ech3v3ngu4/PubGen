<?php

class PublicacaoController extends BaseController{
    
    public function getIndex()
    {
        if(!Auth::check())
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
            
            return View::make('visitantes/lista', compact('titulo', 'publicacoes', 'pesquisa'));
        }
        else
        {
            $titulo = 'Minhas Publicações';
            
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
    }
         
    public function getCriar()
    {
        $titulo = 'Criar Publicação';
        
        $publicacao = new Publicacao;
                
        return View::make('publicacoes/criar', compact('titulo', 'publicacao'));
    }
    
    public function postCriar()
    {
        $input = Input::all();
         // New element
        $publicacao = new Publicacao;
        
        // Validation
        $validator = $publicacao->validate(Input::all());
        
        if ($validator->passes())
        {
            $publicacao->titulo = Input::get('titulo');
            $publicacao->tipo = Input::get('tipo');
            $publicacao->alcance = Input::get('alcance');
            $publicacao->natureza = Input::get('natureza');
            $publicacao->titulo_periodico = Input::get('titulo_periodico');
            $publicacao->local_publicacao = Input::get('local_publicacao');
            $publicacao->num_paginas = Input::get('num_paginas');
            $publicacao->ano_publicacao = Input::get('ano');
            $publicacao->usuario_id = Auth::user()->id;
            $publicacao->editora = Input::get('editora');

            $destinationPath = '';
            $filename        = '';
            
            if (Input::hasFile('pdf')) {
                $file            = Input::file('pdf');
                $destinationPath = public_path().sprintf("/uploads/", str_random(8));
                $filename        = $file->getClientOriginalName();
                $uploadSuccess   = $file->move($destinationPath, $filename);
                if($uploadSuccess)
                {
                    $publicacao->url = sprintf("/uploads/", str_random(8)).$file->getClientOriginalName();
                }
            }
            
            $publicacao->save();
            
            // Salva autores
            if(isset($input['autor_idx']))
            {
                foreach ($input['autor_idx'] as $key => $value) {
                    $autor = New Autor;
                    $autor->nome = $input['autor'.$value];
                    $autor->publicacao_id = $publicacao->id;
                    $autor->save();                    
                }                
            }
            
            // Salva editores
            if(isset($input['editor_idx']))
            {
                foreach ($input['editor_idx'] as $key => $value) {
                    $editor = New Editor;
                    $editor->nome = $input['editor'.$value];
                    $editor->publicacao_id = $publicacao->id;
                    $editor->save();                    
                }                
            }
            
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
        
        $autores = $publicacao->autores()->get()->toArray();
        
        $editores = $publicacao->editores()->get()->toArray();
        
        return View::make('publicacoes/editar', compact('titulo', 'publicacao', 'autores', 'editores'));
    }
    
    public function postEditar()
    {
         // Edit element
        $publicacao = Publicacao::find(Input::get('id'));
            
        // Validation
        $validator = $publicacao->validate(Input::all());

        if ($validator->passes())
        {
            $publicacao->titulo = Input::get('titulo');
            $publicacao->tipo = Input::get('tipo');
            $publicacao->alcance = Input::get('alcance');
            $publicacao->natureza = Input::get('natureza');

            // Salva autores
            if(isset($input['autor_idx']))
            {
                foreach ($input['autor_idx'] as $key => $value) {
                    $autor = New Autor;
                    $autor->nome = $input['autor'.$value];
                    $autor->save();                    
                }                
            }
            
            // Salva editores
            if(isset($input['editor_idx']))
            {
                foreach ($input['editor_idx'] as $key => $value) {
                    $editor = New Editor;
                    $editor->nome = $input['editor'.$value];
                    $editor->save();                    
                }                
            }

            $publicacao->titulo_periodico = Input::get('titulo_periodico');
            $publicacao->editora = Input::get('editora');
            $publicacao->local_publicacao = Input::get('local_publicacao');
            $publicacao->num_paginas = Input::get('num_paginas');
            $publicacao->ano_publicacao = Input::get('ano');
            
            $destinationPath = '';
            $filename        = '';
            
            if (Input::hasFile('pdf')) {
                $file            = Input::file('pdf');
                $destinationPath = public_path().sprintf("/uploads/", str_random(8));
                $filename        = $file->getClientOriginalName();
                $uploadSuccess   = $file->move($destinationPath, $filename);
                if($uploadSuccess)
                {
                    $publicacao->url = sprintf("/uploads/", str_random(8)).$file->getClientOriginalName();
                }
            }
            
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
        
        Autor::where('publicacao_id',Input::get('id'))->delete();
        Editor::where('publicacao_id',Input::get('id'))->delete();
        
        $publicacao = Publicacao::find(Input::get('id'));
        $publicacao->delete();
        
        return Redirect::to('/');
    }
    
    public function getVisualizar($id)
    {
        $titulo = 'Visualizar Publicação';
        
        $publicacao = Publicacao::find($id);
        
        return View::make('publicacoes/visualizar', compact('titulo', 'publicacao'));
    }
    
    public function getLista()
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

            return View::make('visitantes/lista', compact('titulo', 'publicacoes', 'pesquisa'));
    }
}