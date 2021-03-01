<?php

class AccountController extends Controller
{
    public function signupAction()
    {
        return $this->render(array('_token' => $this->generateCsrfToken('account/signup')));
    }

    public function registerAction()
    {
        $token = $this->request->getPost('_token');
        $user_name = $this->request->getPost('user_name');
        $password = $this->request->getPost('password');

        $user = $this->db_manager->get('User')->fetchByUserName($user_name);
        $this->session->set('user', $user);

        return $this->render(array('user_name' => $user_name, 'password' => $password, '_token' => $token), 'signup');
    }
}
