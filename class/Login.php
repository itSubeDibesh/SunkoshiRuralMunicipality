<?php
final class Login extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->table('login');
    }

    public function getUserByUserName($UserName)
    {
        $args = array(
            'where' => array(
                'UserName' => $UserName
            )
        );
        return $this->select($args);
    }

    public function getUserById($id)
    {
        $args = array(
            'where' => array(
                'LoginId' => $id
            )
        );
        return $this->select($args);
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


    public function getUserByToken($token)
    {
        $args = array(
            'where' => array(
                'Token' => $token
            )
        );
        return $this->select($args);
    }

   

    public function getAll(){
      return $this->select();
    }

    public function getUserByLoginID($LoginId)
    {
        $args = array(
            'where' => array(
                'LoginId' => $LoginId
            )
        );
        return $this->select($args);
    }

    public function adduser($data)
    {
        return $this->insert($data);
    }

    public function selectCountUnapproved(){
        $args = array(
            'fields' => 'COUNT(*) AS Count',
            'where' => array(
                'Approval' => 'Approved'
            )
        );
        return $this->select($args);
    }

    public function selectCountAll(){
        $args = array(
            'fields' => 'COUNT(*) AS "Count"'
        );
        return $this->select($args);
    }

    public function deleteLoginID($id){
        $args = array(
            'where' => array(
                'LoginId' => $id
            )
        );
        return $this->delete($args);
    }

}
