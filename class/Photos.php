<?php 

final class Photos extends Database
{
	public function __construct()
	{
		parent::__construct();
		$this->table('photogallery');
	}	

	public function getAllPhotos()
	{
		$args=array(
			'order_by'=>'PhotoId DESC'
		);
		return $this->select($args);
	}

	public function getPhotoById($photo_id)
	{
		$args=array(
			'where'=>array(
				'PhotoId'=>$photo_id
			),
			'order_by'=>'PhotoId ASC'
		);
		return $this->select($args);
	}

	public function updatePhotoGalleryById($data,$photo_id)
	{
		$args=array(
			'where'=>array(
				'PhotoId'=>$photo_id
			)
		);
		$success = $this->update($data, $args);/* Run update Statement*/
        if ($success) {
            return $photo_id;
        } else {
            return false;
        }
	}

	public function addPhoto($data)
	{
		return $this->insert($data);
	}

	public function deletePhotoById($photo_id)
	{
		$args=array(
			'where'=>array(
				'PhotoId'=>$photo_id
			)
		);
		return $this->delete($args);
	}
}