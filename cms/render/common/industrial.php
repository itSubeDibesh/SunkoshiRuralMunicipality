<?php 
	require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';	
	$industry = new Industrial();
	$lg_id=$_SESSION['LoginId'];
	// debug($_POST,true);
	if(isset($_POST,$_POST['Action'])&&!empty($_POST)&&$_POST['Action']=='Add')
	{		
		if(isset($_POST['is_banned'])&&!empty($_POST['is_banned'])&&$_POST['is_banned']=='on')
			{
				$isBanned='Banned';			
			}
			else
			{
				$isBanned='Not Banned';			
			}
			if(isset($_POST['is_present'])&&!empty($_POST['is_present'])&&$_POST['is_present']=='on')
			{
				$isPresent='Present';			
			}
			else
			{
				$isPresent='Collapsed';			
		}
		$data=array(
			'Name'=>$_POST['name'],
			'OwnerName'=>$_POST['ownername'],
			'Contact'=>$_POST['contact'],
			'Location'=>$_POST['location'],
			'WardId'=>$_POST['ward_id'],
			'RegestrationNo'=>$_POST['reg_no'],
			'EstablishedDate'=>$_POST['established_date'],
			'Type'=>$_POST['type'],
			'isBanned'=>$isBanned,
			'EmployeeCount'=>$_POST['employee'],
			'isPreasent'=>$isPresent,
			'UploadedBy'=>$lg_id
		);
		if(isset($_POST['ownername'])&&!empty($_POST['ownername']))
		{			
			if(isset($_POST['ward_id'])&&!empty($_POST['ward_id']))
			{
				if(isset($_POST['established_date'])&&!empty($_POST['established_date']))
				{
					if(isset($_POST['type'])&&!empty($_POST['type']))
					{
						if(isset($_POST['employee'])&&($_POST['employee'])>=0)
						{
							$add=$industry->addIndustrialInfo($data);
							if($add)
							{
								redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/industrialList.php','success','Industry Added Successfully');
							}
							else
							{
								redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/industrialList.php','error','Error While Adding Industry');	
							}
						}
						else
						{
							redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/industrialList.php','error','Invalid Employee Count');	
						}
					}
					else
					{
						redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/industrialList.php','error','Please Select Industry Type');	
					}
				}
				else
				{
					redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/industrialList.php','error','Please provide Established Date');	
				}
			}
			else
			{
				redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/industrialList.php','error','Please provide Ward Id');
			}			
		}
		else
		{
			redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/industrialList.php','error','Please provide Owner Name');
		}
	}
	elseif(isset($_POST,$_POST['Action'])&&!empty($_POST)&&$_POST['Action']=='Update')
	{
		if(isset($_POST['is_banned'])&&!empty($_POST['is_banned'])&&$_POST['is_banned']=='on')
		{
			$isBanned='Banned';			
		}
		else
		{
			$isBanned='Not Banned';			
		}
		if(isset($_POST['is_present'])&&!empty($_POST['is_present'])&&$_POST['is_present']=='on')
		{
			$isPresent='Present';			
		}
		else
		{
			$isPresent='Collapsed';			
		}
			
		$data=array(
			'Name'=>$_POST['name'],
			'OwnerName'=>$_POST['ownername'],
			'Contact'=>$_POST['contact'],
			'Location'=>$_POST['location'],
			'WardId'=>$_POST['ward_id'],
			'RegestrationNo'=>$_POST['reg_no'],
			'EstablishedDate'=>$_POST['established_date'],
			'Type'=>$_POST['type'],
			'isBanned'=>$isBanned,
			'EmployeeCount'=>$_POST['employee'],
			'isPreasent'=>$isPresent,
			'UploadedBy'=>$lg_id
		);
		if($data)
		{			
			$success=$industry->updateIndustry($data,$_POST['IndustryId']);			
			if($success)
			{
				redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/industrialList.php','success','Industry Updated Successfully');
			}
			else
			{
				redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/industrialList.php','error','Error while updating industry');
			}
		}
		else
		{
			redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/industrialList.php','error','Please provide every data');
		}
	}
	elseif(isset($_GET,$_GET['Action'])&&!empty($_GET)&&$_GET['Action']=='Delete')
	{
		if(isset($_GET['id'])&&!empty($_GET['id']))
		{
			$delete=$industry->deleteIndustry($_GET['id']);

			if($delete)
			{
				redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/industrialList.php','success','Industry Deleted Successfully');	
			}
			else
			{
				redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/industrialList.php','error','Error while deleting indusrtry');	
			}
		}		
		else
		{
			redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/industrialList.php','error','Industry already deleted or not exist');	
		}
	}