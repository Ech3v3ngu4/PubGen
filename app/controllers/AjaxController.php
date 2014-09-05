<?php

class AjaxController extends BaseController{
    
    public function __construct() {
        // Retornar somente chamadas AJAX        
        if (!Request::ajax()) 
        {
            App::abort(404);
        }
    }
    
    public function getAutor()
    {   
        $key = Input::get('key');
        $autor = '';
        return View::make('publicacoes/autor', compact('key', 'autor'));
    }
}