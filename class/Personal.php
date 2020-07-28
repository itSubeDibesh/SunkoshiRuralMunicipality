<?php
final class Personal extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->table('personalinfo');
    }

    public function getByName($Name)
    {
        $args = array(
            'where' => array(
                'Name' => $Name
            )
        );
        return $this->select($args);
    }

    public function getByID($Id)
    {
        $args = array(
            'where' => array(
                'PersonalinfoID' => $Id
            )
        );
        return $this->select($args);
    }

    public function deleteById($Id)
    {
        $args = array(
            'where' => array(
                'PersonalinfoID' => $Id
            )
        );
        return $this->delete($args);
    }


    public function updatePerson($data, $PersonId)
    {
        $args = array(
            'where' => array(
                'PersonalinfoID' => $PersonId
            )
        );
        $success = $this->update($data, $args);
        if ($success) {
            return $PersonId;
        } else {
            return false;
        }
    }

    public function addPerson($data)
    {
        return $this->insert($data);
    }

    public function getAllPerson()
    {
        return $this->select();
    }

    public function selectCountCv($contition,$value){
        $args = array(
            'fields' => 'COUNT(*) AS Count',
            'where' => array(
              ''.$contition.'' => ''.$value.''
            )
        );
        return $this->select($args);
    }

    public function selectCountC($contition){
        $args = array(
            'fields' => 'COUNT(*) AS Counts',
            'where' => $contition
        );
        return $this->select($args);
    }

    public function selectFieldC($field){
        $args = array(
            'fields' => $field.'AS Counts'
        );
        return $this->select($args);
    }
}
