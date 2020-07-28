<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$action = 'Add';
$title = ucfirst($_SESSION['Role']) ." ".$action. " Industry || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';
?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/industrialList.php'; ?>">
            <i class="fa fa-chevron-circle-left"></i> Back to industrial List</a>
    </div>
</div>
<br>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3><?php echo $action ?> industrial information</h3>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo ADMIN_RENDER . '/common/industrial.php' ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="Action" value="<?php echo $action ?>">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class="form-control-label">Name:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="name" name="name"  placeholder="Text" class="form-control">                                                    
                    </div>
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Owner Name:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="ownername" name="ownername"  placeholder="Owner Name" class="form-control">                                                    
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Contact:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" id="contact" name="contact"  placeholder="Contact Number" class="form-control">                                                    
                    </div>
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Location:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="location" name="location"  placeholder="Location" class="form-control">                                                    
                    </div>                    
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Ward:</label>
                    </div>
                    <div class="col-12 col-md-3"> 
	                    <select name="ward_id" id="ward_id" class="form-control">
                        <option disabled selected>-- Please select --</option>
                            <option value="1" >Thorkapa 1</option>
                            <option value="2" >Thorkapa 2</option>
                            <option value="3" >Kalika</option>
                            <option value="4" >Yamunadanda</option>
                            <option value="5" >Sunkhani</option>
                            <option value="6" >Thumpakhar</option>
                            <option value="7" >Pangretar</option>		
	                    </select>
	                </div>
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Regestration No:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" id="reg_no" name="reg_no" class="form-control">
                    </div>                    
                </div>
                <div class="row form-group">             
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Established Date:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="date" id="established_date"  name="established_date" class="form-control">
                    </div>                    
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Type :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <select name="type" id="type" class="form-control">
                             <option disabled>Please select</option>
                             <option value="Government">Government</option>
                             <option value="Private" >Private</option>                             
                         </select>
                     </div>    
                </div>
                <div class="row form-group">  
                	<div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Employee Count :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" id="employee" name="employee"  placeholder="Text" class="form-control">                                                    
                    </div>
                	 <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Banned:</label>
                    </div>
                    <div class="col col-md-3">
                        <label class="au-checkbox">
                            <input type="checkbox" name="is_banned">
                            <span class="au-checkmark"></span>
                        </label>
                     </div>                    
                                        
                </div>                
                <div class="row form-group">                 	    
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Operating:</label>
                    </div>
                    <div class="col col-md-3">
                        <label class="au-checkbox">
                            <input type="checkbox" name="is_present">
                            <span class="au-checkmark"></span>
                        </label>
                     </div>
                     <div class="row form-group">
                </div>
                </div> 	
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-pen"></i><?php echo $action ?>
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/footer.php';
?>