<?php
final class Organization extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->table('organizationalinfo');
    }

    public function selectCountC($contition){
        $args = array(
            'fields' => 'COUNT(*) AS Counts',
            'where' => $contition,
            'order_by' => 'OrganizationId DESC'
        );
        return $this->select($args);
    }

    public function selectFieldC($field){
        $args = array(
            'fields' => $field.'AS Counts',
            'order_by' => 'OrganizationId DESC'
        );
        return $this->select($args);
    }
    public function getByID($Id)
    {
        $args = array(
            'where' => array(
                'OrganizationId' => $Id
            ),
            'order_by' => 'OrganizationId'
        );
        return $this->select($args);
    }

    public function deleteById($Id)
    {
        $args = array(
            'where' => array(
                'OrganizationId' => $Id
            )
        );
        return $this->delete($args);
    }


    public function updateOrganization($data, $Id)
    {
        $args = array(
            'where' => array(
                'OrganizationId' => $Id
            )
        );
        $success = $this->update($data, $args);
        if ($success) {
            return $Id;
        } else {
            return false;
        }
    }

    public function addOrganization($data)
    {
        return $this->insert($data);
    }

    public function getAllOrganization()
    {
        $args = array(            
            'order_by' => 'OrganizationId'
        );

        return $this->select($args);
    }
}
?>