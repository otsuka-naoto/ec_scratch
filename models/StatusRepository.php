<?php

class StatusRepository extends DbRepository
{
    public function insert()
    {
        $sql = "";

        
    }

    public function fetchAllPersonalArchivesByUserId($user_id)
    {
        $sql = "";

        return $this->fetchAll($sql, array(':user_id' => $user_id));
    }
}
