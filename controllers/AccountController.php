<?php

class AccountController extends Controller
{
    public function signupAction()
    {
        return $this->render(array('_token' => 'account/signup'));
    }

    public function registerAction()
    {
        $user_name = $this->request->getPost('user_name');
        $password = $this->request->getPost('password');

        return $this->redirect('/');
    }
}
