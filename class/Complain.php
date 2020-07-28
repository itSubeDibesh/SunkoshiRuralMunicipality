<?php 

final class Complain extends Database
{
	public function __construct()
	{
		parent::__construct();
		$this->table('complain');
	}	

	public function add($data){  
		return $this->insert($data);
	}
	
	public function getAll()
	{
		$args=array(
			'order_by'=>'id ASC'
		);
		return $this->select($args);
	}

	public function getByID($id)
	{
		$args=array(
			'where'=>array(
				'id'=>$id
			),
			'order_by'=>'id ASC'
		);
		return $this->select($args);
	}

    public function deleteById($Id)
    {
        $args = array( 
            'where' => array(
                'id' => $Id
            )
        );
        return $this->delete($args);
	}
	
	public function UpdateById($data,$id)
	{
		$args = array(
            'where' => array(
                'Id' => $id
            )
        );
        $success = $this->update($data, $args);
        if ($success) {
            return $id;
        } else {
            return false;
        }
	}
}