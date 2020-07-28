<?php
final class Wards extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->table('wardinfo');
    }

    public function getAllWards()
    {
    	$args=array(    		
    		'order_by' => 'WardId ASC'
    	);
    	return $this->select($args);
    }
    
    public function getWardById($WardId)
    {
    	$args=array(    		
    		'where'=>array(
    			'WardId'=>$WardId
    		),
    		'order_by' => 'WardId ASC'	
    	);
    	return $this->select($args);
    }

    public function updateWardByPost($data, $user_id)
    {
        $args = array(
            'where' => array(
                'Post' => 'Post'
            )
        );
        $success = $this->update($data, $args);/* Run update Statement*/
        if ($success) {
            return $user_id;
        } else {
            return false;
        }
    }

   
}
