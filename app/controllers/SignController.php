<?php

class SignController extends BaseController {

    public function getIn()
    {
        $hide_entrar = TRUE;
        $titulo = 'Entrar';

        // Redirecionamento opcional
        $redirect = Input::get('redirect');
        
        return View::make('sign/in', compact('hide_entrar', 'titulo', 'redirect'));
    }

    public function postIn()
    {
        // Opção de lembrar do usuário
        $remember = false;
        if(Input::get('remember'))
        {
            $remember = true;
        }
         
        // Autenticação
        if (Auth::attempt(array(
            'email' => Input::get('email'), 
            'password' => Input::get('password')
            ), $remember))
        {
            if(Input::get('redirect'))
            {
                return Redirect::to(urldecode(Input::get('redirect')));
            }
            
            return Redirect::to('publicacoes');
        }
        else
        {
            return Redirect::to('sign/in')
                ->with('flash_error', 1)
                ->withInput();
        }
    }
    
    public function getOut()
    {
        Auth::logout();
        
        return Redirect::to('sign/in');
    }
    
        public function getCriar()
    {
        $titulo = 'Criar Usuário';

        return View::make('sign/criar', compact('titulo'));
    }

    public function postCriar()
    {
        $input = Input::all();

        $usuario = new User;

        // Validação
        $validacao = $usuario->validate(Input::all());

        if ($validacao->passes())
        {
            $nomes_publicacao = explode(',',$input['nome_publicacao']);
            $nomes_publicacao = json_encode($nomes_publicacao);

            //Salva usuário
            $usuario->nome = $input['nome'];
            $usuario->email = $input['email'];
            $usuario->password = Hash::make($input['password']);
            $usuario->username = $input['username'];
            $usuario->nome_publicacao = $nomes_publicacao;
            $usuario->instituicao = $input['instituicao'];
            $usuario->area = $input['area'];
            $usuario->linha_pesquisa = $input['linha_pesquisa'];
            
            $usuario->save();

            return Redirect::to('sign/in')->
                    with('notification', 'Usuário Criado com sucesso!');
        }

        return Redirect::to('sign/criar/')->
                withErrors($validacao)->
                withInput();
    }
    /**
     * Exibe a view de recuperação de senha
     *
     * @return Response
     */
//    public function getRecuperar()
//    {
//        return View::make('visitante.recuperar');
//    }
//
//    /**
//     * Trata o POST para recuprar a senha do usuário.
//     *
//     * @return Response
//     */
//    public function postRecuperar()
//    {
//        $response = Password::remind(Input::only('email'), function($message)
//        {
//            $message->subject('Lembrete de Senha');
//        });
//        
//        switch ($response)
//        {
//            case Password::INVALID_USER:
//                return Redirect::back()->with('error', Lang::get($response));
//
//            case Password::REMINDER_SENT:
//                return Redirect::back()->with('status', Lang::get($response));
//        }
//    }

    /**
     * Exibe a recuperação de senha para o token enviado.
     *
     * @param  string  $token
     * @return Response
     */
//    public function getNovaSenha($token = null)
//    {
//        if (is_null($token)) App::abort(404);
//
//        return View::make('visitante.nova-senha')->with('token', $token);
//    }
//
//    /**
//     * Trata o POST com a nova senha.
//     *
//     * @return Response
//     */
//    public function postNovaSenha()
//    {
//        $credentials = Input::only(
//            'email', 'password', 'password_confirmation', 'token'
//        );
//
//        $response = Password::reset($credentials, function($user, $password)
//        {
//            $user->password = Hash::make($password);
//
//            $user->save();
//        });
//
//        switch ($response)
//        {
//            case Password::INVALID_PASSWORD:
//            case Password::INVALID_TOKEN:
//            case Password::INVALID_USER:
//                return Redirect::back()->with('error', Lang::get($response));
//
//            case Password::PASSWORD_RESET:
//                Auth::attempt(array(
//                    'email' => Input::get('email'),
//                    'password' => Input::get('password')
//                    ), TRUE);
//                return Redirect::route('home');
//        }
//    }
}