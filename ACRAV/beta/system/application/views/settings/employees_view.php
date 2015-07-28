<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITE_TITLE." - ".$this->session->userdata('page_title');?></title>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/acrav.js"></script>
<script language="javascript"  type="text/javascript">
var http = getHTTPObject(); // We create the HTTP Object
</script>
<link href="<?php echo base_url();?>system/application/views/css/acrav.css" rel="stylesheet" type="text/css" />
</head>

<body topmargin="0" class="mainbg">
<table width="970" border="0" cellspacing="0" cellpadding="5" align="center">
  <tr>
    <td nowrap><?php 
	$userdetails['page'] = 'settings_users';
	$this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="10" class="tableborder">
      <tr>
        <td nowrap="nowrap" class="bottomtableborder_greybg"><b>Manage Employees </b> </td>
      </tr>
      <tr>
        <td><form id="form1" name="form1" method="post" action="<?php echo base_url()."index.php/settings/search/load_results/type/employee";?>">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              
			  <tr>
			    <td height="38" nowrap="nowrap"><input name="cancel" type="button" id="cancel" value="Cancel" onclick="location.href='<?php echo base_url();?>index.php/settings/acravsettings'" class="button"/>
			      <input name="addemployee" type="button" id="addemployee" value="Add" onclick="location.href='<?php echo base_url();?>index.php/settings/employees/load_form'" class="button"/></td>
			    </tr>
			  <tr>
			    <td>&nbsp;</td>
			    </tr>
			  <tr>
			    <td class="darkgreybg"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                  <tr>
                    <td nowrap="nowrap" width="1%"><b>Instant Search:</b></td>
                    <td nowrap="nowrap" width="1%"><input name="searchtype" id="username" type="radio" value="username" onclick="passFormValue('username', 'searchby', 'radio');" <?php if(!isset($searchfield) || (isset($searchfield) && $searchfield == 'username')){echo " checked";} ?>/></td>
                    <td nowrap="nowrap" width="1%">By User ID </td>
                    <td nowrap="nowrap" width="1%"><input name="searchtype" id="firstname" type="radio" value="firstname" onclick="passFormValue('firstname', 'searchby', 'radio');"  <?php if(isset($searchfield)  && $searchfield == 'firstname'){echo " checked";} ?>/></td>
                    <td nowrap="nowrap" width="1%">By First Name </td>
                    <td nowrap="nowrap" width="1%"><input name="searchtype" id="lastname" type="radio" value="lastname" onclick="passFormValue('lastname', 'searchby', 'radio');" <?php if(isset($searchfield) && $searchfield == 'lastname'){echo " checked";} ?>/></td>
                    <td nowrap="nowrap" width="1%">By Last Name </td>
					<td nowrap="nowrap" width="1%"><input name="searchtype" id="emailaddress" type="radio" value="emailaddress" onclick="passFormValue('emailaddress', 'searchby', 'radio');" <?php if(isset($searchfield) && $searchfield == 'emailaddress'){echo " checked";} ?>/></td>
                    <td nowrap="nowrap" width="1%">By Email</td>
                    <td nowrap="nowrap" width="1%"><input name="searchby" type="hidden" id="searchby" value="<?php 
					if(isset($searchfield)){
						echo $searchfield;
					} else { echo "username";}
					?>" /><input name="layerid" type="hidden" id="layerid" value="searchresults" /></td>
                    <td nowrap="nowrap" width="1%"><input name="search" type="text" class="textfield" id="search" size="45" onkeyup="startInstantSearch('search', 'searchby', '<?php echo base_url();?>index.php/settings/search/load_results/type/employee')"<?php 
					if(isset($phrase)){
						echo " value='".$phrase."'";
					}
					?> onkeypress="return handleEnter(this, event)"/></td>
					<td nowrap="nowrap" width="91%"><input name="searchbutton" type="submit" id="searchbutton" value="Search" onkeypress="return handleEnter(this, event)" class="button"/></td>
                  </tr>
                </table></td>
			    </tr>
				<?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?>
			  <tr>
			    <td><div style="padding:5px;width:925px;height:350px;overflow: auto" id='searchresults'>
				<table width="100%" border="0" cellspacing="0" cellpadding="4">
                  <tr>
                    <td colspan="14"><hr /></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td nowrap="nowrap"><b>User ID</b></td>
                    <td nowrap="nowrap"><b>Name</b></td>
                    <td nowrap="nowrap"><b>Gender</b></td>
                    <td nowrap="nowrap"><b>Job Title</b></td>
                    <td nowrap="nowrap"><b>Job Category</b></td>
                    <td nowrap="nowrap"><b>Employee Type</b></td>
                    <td nowrap="nowrap"><b>Email Address</b></td>
                    <td nowrap="nowrap"><b>Is Active?</b></td>
                    <td nowrap="nowrap"><b>Is Admin?</b></td>
                    <td nowrap="nowrap"><b>User Type</b></td>
                    <td nowrap="nowrap"><b>State</b></td>
					<td nowrap="nowrap"><b>Company Name</b></td>
					<td nowrap="nowrap"><b>Date Created</b></td>
                    </tr>
                  <tr>
                    <td colspan="14"><hr /></td>
                  </tr>
                  <?php 
				$counter = 0;
				foreach($employee_result AS $employee){?>
                  <tr style="<?php echo get_row_color($counter, 2);?>">
                    <td width="1%" valign="top" nowrap="nowrap">[ <a href="<?php echo base_url();?>index.php/settings/employees/load_form/id/<?php echo $employee['id'];?>">Edit</a> | <a href="javascript: deleteEntity('<?php echo base_url();?>index.php/settings/employees/delete_employee_data/id/<?php echo $employee['id'];?>','employee','<?php echo $employee['firstname'];?>');">Delete</a> ]</td>
                    <td width="1%" valign="top"><?php echo $employee['username'];?></td>
                    <td width="1%" valign="top" nowrap><?php echo $employee['firstname'];?></td>
                    <td width="1%" valign="top"><?php echo $employee['gender'];?></td>
                    <td width="1%" valign="top"><?php echo $employee['jobtitle'];?></td>
                    <td width="1%" valign="top"><?php //echo $employee['jobcategory'];?></td>
                    <td width="1%" valign="top"><?php echo $employee['employeetype'];?></td>
                    <td width="1%" valign="top"><?php echo $employee['emailaddress'];?></td>
                    <td width="1%" valign="top"><?php echo $employee['isactive'];?></td>
                    <td width="1%" valign="top"><?php echo $employee['isadmin'];?></td>
                    <td width="1%" valign="top"><?php echo $employee['usertype'];?></td>
                    <td width="1%" valign="top"><?php echo $employee['stateorprovince'];?></td>
					<td width="1%" valign="top"><?php //echo $employee['companyname'];?></td>
					<td width="88%" valign="top"><?php echo $employee['datecreated'];?></td>
                  </tr>
                  <?php 
				  	$counter++;
				  }?>
                </table>
			    </div></td>
			    </tr>
			  <tr>
			    <td>&nbsp;</td>
			    </tr>
            </table>
        </form></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><?php $this->load->view('incl/footer');?></td>
  </tr>
</table>
</body>
</html>
