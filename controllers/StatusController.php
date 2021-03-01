<?php

class StatusController extends Controller
{
    public function indexAction()
    {
        //to-do sessionが未実装

        $user = $this->session->get('user');
        $obj1 = $this->db_manager;
        $obj2=$obj1->get('Status');
        echo $user;

        // $obj3=$obj2->fetchAllPersonalArchivesByUserId($user['id']);
        // $statuses = $this->db_manager->get('Status')->fetchAllPersonalArchivesByUserId($user['id']);

        // return $this->render(array(
        //     'statuses' => $statuses,
        //     'body' => '',
        //     '_token' => 'status/post'
        // ));
    }

}
