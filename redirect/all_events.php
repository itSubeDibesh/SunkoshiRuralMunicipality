<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php'; 
 $events = new News_Event();
 $all_events=$events->getAll(); 
 $active_events=$events->getNewsEventsByTypeStatus('events');
 $count=count($active_events);
 $_title='All Events';
require '../inc/header.php';
?><br><br><br><br><br><br><br>
<link rel="stylesheet" href="<?php echo ADMIN_ASSETS.'/DataTables/dataTables.min.css';?>">
<section class="events">
   	<div class="container">  
   		<div class="alert alert-primary">            	        
            <h2>Events</h2>  
        	<span>Total events : <?php echo $count; ?></span>	        
        </div>	
      <div class="row" id="main_content">
      	<?php			      	
      		foreach ($all_events as $value) {       			
      				if($value->Type=='events'&&$value->Status=='active')
      				{
      			?>
      		 <div class="col-lg-6 col-md-4 col-sm-12">
	            <div class="inner-img">
	               	<a href="">
	               		<img class="img img-responsive" src="<?php echo UPLOAD_URL.'/news_event/'.$value->Image;?>" style="max-width: 60%; height: auto;">	
	               </a>
	            </div>
	        </div>
	        <div class="col-lg-6 col-md-8 col-sm-12">
	            <div class="inner-details">
	               <h2><a href="news.php?id=<?php echo $value->InfoId; ?>"><?php echo $value->Title; ?></a></h2>
	               <p><?php echo html_entity_decode($value->Summary); ?> </p>
	            </div>
	        </div>  
        <?php		
      		}
      	}
      	 ?>
               
      </div>
   </div>
</section>