<?php
    final class Video extends Database{
        public function __construct()
        {
            Database::__construct();
            $this->table('videogallery');
        }

        public function addVideo($data){  
            return $this->insert($data);
        }

        public function getAllVideo(){
            $args = array(
                'order_by' => 'VideoId DESC'
            );

            return $this->select($args);
        }

        public function getVideos($limit){
            $args = array(
                'where' => array(
                    'status' => 'active'
                ),
                'order_by' => 'VideoId DESC',
                'limit' => ' 0, '.$limit
            );

            return $this->select($args);
        }

        public function getVideoById($id){
            $args = array(
                'where' => array(
                    'VideoId' => $id
                ),
                'order_by' => 'VideoId DESC'
            );

            return $this->select($args);
        }

        public function deleteVideo($id){
            $args = array(
                'where' => array(
                    'VideoId' => $id
                )
            );

            return $this->delete($args);
        }

        public function updateVideo($data, $video_id){
            $args = array(
                'where' => array(
                    'VideoId' => $video_id
                )
            );

            return $this->update($data, $args);
        }
    }