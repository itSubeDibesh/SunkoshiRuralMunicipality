<?php
final class Officer extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->table('officer');
    }


    public function getUserByID($OfficerId)
    {
        $args = array(
            'where' => array(
                'OfficerId' => $OfficerId
            )
        );
        return $this->select($args);
    }

    public function getByLogineID($Id)
    {
        $args = array(
            'where' => array(
                'LoginId' => $Id
            ),
            'order_by'=>'LoginId ASC'
        );
        return $this->select($args);
    }

    public function deleteOfficer($id)
    {
        $args = array(
            'where' => array(
                'OfficerId' => $id
            )
        );
        return $this->delete($args);
    }

    public function updateUser($data, $user_id)
    {
        $args = array(
            'where' => array(
                'LoginId' => $user_id
            )
        );
        $success = $this->update($data, $args);
        if ($success) {
            return $user_id;
        } else {
            return false;
        }
    }

    public function updateUserByOfficers($data, $user_id)
    {
        $args = array(
            'where' => array(
                'OfficerId' => $user_id
            )
        );
        $success = $this->update($data, $args);
        if ($success) {
            return $user_id;
        } else {
            return false;
        }
    }


    public function getAllOfficer()
    {
        return $this->select();
    }

    public function getOfficerById($OfficerId)
    {
        $args = array(
            'where' => array(
                'OfficerId' => $OfficerId
            )
        );
        return $this->select($args);
    }

    public function getOfficerByLoginID($LoginId)
    {
        $args = array(
            'where' => array(
                'LoginId' => $LoginId
            ),
            'order_by' => 'LoginId ASC'
        );
        return $this->select($args);
    }

    public function updateUserByOfficerId($data, $OfficerId)
    {
        $args = array(
            'where' => array(
                'OfficerId' => $OfficerId
            )
        );
        $success = $this->update($data, $args);/* Run update Statement*/
        if ($success) {
            return $OfficerId;
        } else {
            return false;
        }
    }



    public function updateOfficer($data, $OfficerId)
    {
        $args = array(
            'where' => array(
                'OfficerId' => $OfficerId
            )
        );
        return $this->update($data, $args);
    }

    public function getAll()
    {
        return $this->select();
    }

    public function addOfficer($data)
    {
        return $this->insert($data);
    }
}
