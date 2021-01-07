<?php

class EcScratchApplication extends Application
{
    protected $login_action = array('account', 'signin');

    public function getRootDir()
    {
        return dirname(__FILE__);
    }

    protected function registerRoutes()
    {
        return array();
    }

    protected function configure()
    {
        $this->db_manager->connect('master', array(
            'dsn' => 'mysql:dbname=ec_scratch;host=localhost',
            'user' => 'root',
            'password' => 'root',
        ));
    }
}
