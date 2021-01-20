<?php

class AccountController extends Controller
{
    public function signupAction()
    {
        return $this->render(array('account/signup'));
    }

}