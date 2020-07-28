<?php 
final class News_Event extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->table('newsandevents');
    }

    public function addNewsEvents($data)
	{
		return $this->insert($data);
	}

	public function getAll()
	{
		$args=array(
			'order_by'=>'InfoId DESC'
		);
		return $this->select($args);
	}

	public function getNewsEventsById($info_id)
	{
		$args=array(
			'where'=>array(
				'InfoId'=>$info_id
			),
			'order_by'=>'InfoId DESC'
		);
		return $this->select($args);
	}

	public function getNewsEventsByType($type)
	{
		$args=array(
			'where'=>array(
				'Type'=>$type
			),
			'order_by'=>'InfoId DESC'
		);
		return $this->select($args);
	}
	
	public function updateNewsEventsById($data,$id)
	{
		$args=array(
			'where'=>array(
				'InfoId'=>$id
			)
		);
		$success = $this->update($data, $args);/* Run update Statement*/
        if ($success) {
            return $id;
        } else {
            return false;
        }
	}

	public function deleteNewsEventsById($id)
	{
		$args=array(
			'where'=>array(
				'InfoId'=>$id
			)
		);
		return $this->delete($args);
	}

	
	public function getNewsEventsByTypeStatus($type)
	{
		$args=array(
			'where'=>array(
				'Type'=>$type,
				'Status'=>'active'
			),
			'order_by'=>'InfoId DESC',			
		);
		return $this->select($args);
	}

	public function getRelatedNews($type, $id){
            $args = array(
                'fields' => 'InfoId, Title, Summary, Image',
                'where' =>array(
                	'Type'=>$type,
                	'Status'=>'active',
                	'InfoId'=>$id
                ),
                'order_by' => 'InfoId DESC',
                'limit' => ' 0, 4'
            );

            return $this->select($args);
        }

}
