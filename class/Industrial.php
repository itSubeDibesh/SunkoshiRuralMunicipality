<?php
final class Industrial extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->table('industrialinfo');
    }

    public function getAllIndustrialInfo()
    {
    	$args=array(
    		'order_by'=>'IndustryId ASC'
    	);
    	return $this->select($args);
    }        

    public function addIndustrialInfo($data)
    {
        return $this->insert($data);
    }    

     public function updateIndustry($data, $industry_id)
    {
        $args = array(
            'where' => array(
                'IndustryId' => $industry_id
            )
        );
        $success = $this->update($data, $args);/* Run update Statement*/
        if ($success) {
            return $industry_id;
        } else {
            return false;
        }
    }

    public function getIndustryByID($industry_id)
    {
    	$args=array(
    		'where'=>array(
    			'IndustryId'=>$industry_id
    		),
    		'order_by'=>'IndustryId ASC'
    	);
    	return $this->select($args);
    }

    public function deleteIndustry($industry_id)
    {
    	$args=array(
    		'where'=>array(
    			'IndustryId'=>$industry_id
    		)
    	);
    	return $this->delete($args);
    }

    public function selectCountC($contition){
        $args = array(
            'fields' => 'COUNT(*) AS Counts',
            'where' => $contition,
            'order_by' => 'IndustryId DESC'
        );
        return $this->select($args);
    }

    public function selectFieldC($field){
        $args = array(
            'fields' => $field.'AS Counts',
            'order_by' => 'IndustryId DESC'
        );
        return $this->select($args);
    }
}

