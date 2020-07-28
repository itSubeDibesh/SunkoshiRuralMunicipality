<?php 

final class Website extends Database
{
	public function __construct()
	{
		parent::__construct();
		$this->table('website');
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