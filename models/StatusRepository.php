<?php

class StatusRepository extends DbRepository
{
    public function insert($user_id, $body)
    {
        $now = new DateTime();

        $sql = " INSERT INTO status(user_id, body, created_at) VALUES(:user_id, : body, :created_at)";

        $stmt = $this->execute($sql, array(':user_id' => $user_id, ':body' => $body, ':created_at' => $now->format('Y-m-d H:i:s')));
    }

    public function fetchAllPersonalArchivesByUserId($user_id)
    {
        $sql = " SELECT * FROM stats  ";

        return $this->fetchAll($sql, array(':user_id' => $user_id));
    }
}
