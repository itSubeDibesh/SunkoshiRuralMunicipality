<?php 

final class Gallery extends Database
{
	public function __construct()
	{
		parent::__construct();
		$this->table('gallery_image');
	}	

	public function getAllImages()
	{
		$args=array(
			'order_by'=>'PhotoId ASC'
		);
		return $this->select($args);
	}

	public function addImages($data)
	{
		return $this->insert($data);
	}

	public function getImageByPhotoID($photo_id)
	{
		$args=array(
			'where'=>array(
				'photogallery_id'=>$photo_id
			),
			'order_by'=>'Id ASC'
		);
		return $this->select($args);
	}

	public function deleteImagesById($photo_id)
	{
		$args=array(
			'where'=>array(
				'PhotoId'=>$photo_id
			)
		);
		return $this->delete($args);
	}

	public function getGalleryByphotoId($id)
	{
		$args=array(
			'where'=>array(
				'photogallery_id'=>$id
			),
			'order_by'=>'Id ASC'
		);
		return $this->select($args);
	}

	public function deleteImageByName($name){
            $args = array(
                'where' => array(
                    'image' => $name
                )
            );

            return $this->delete($args);
        }
}