<?php 

final class Problem extends Database
{
	public function __construct()
	{
		parent::__construct();
		$this->table('problem');
	}	

	public function add($data){  
		return $this->insert($data);
	}

	public function getAll()
	{
		$args=array(
			'order_by'=>'Id ASC'
		);
		return $this->select($args);
	}

	public function getByID($id)
	{
		$args=array(
			'where'=>array(
				'Id'=>$id
			),
			'order_by'=>'Id ASC'
		);
		return $this->select($args);
	}

    public function deleteById($Id)
    {
        $args = array( 
            'where' => array(
                'Id' => $Id
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