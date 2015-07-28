<?php 
	require_once("access.php"); 
	$rows = prove_access();
	if($rows == 0){
		echo "<fieldset><div style='color:#F00; text-align:center; font-size:14px;'>Access denied! You have no permissions to access this area.</div></fieldset>"; 
	}else{
?>

<div class="main-content grid_7 alpha">
	<header>
      <div class="view-switcher">
         <h2>Add new user</h2>
      </div>
    </header>
    <section>
		<form id="user" class="form grid_6 viaAjax" action="backend.php?adduser=true" method="post">
          <fieldset>
           <legend>User details</legend>
              <label>First Name <em>*</em><small>Enter user's first name</small></label><input type="text" name="fname" required="required"/>
              <label>Last Name <em>*</em><small>Enter user's last name</small></label><input type="text" name="lname" required="required"/>
               <label>Phone<small>(eg. 256757262171)</small></label><input type="text" name="phone" required="required"/>
               <label>Email <em>*</em><small>User's email address</small></label><input type="email" name="email" required="required"/>
               <label>Username <em>*</em><small>Alphanumeric (max 12 char.)</small></label><input type="text" name="username" required="required" maxlength="12" />
               <label>Password<small>max. 30 char.</small></label><input type="password" name="password" maxlength="30" required="required"/>
               <label>Password check<small>Re-enter user's password</small></label><input type="password" name="check" data-equals="password" maxlength="30" required="required"/>
                    
        <div class="action">
           <button class="button button-green" type="submit"><span class="accept"></span>OK</button>
           <button class="button button-gray" type="reset">Reset</button>
         </div>
        </fieldset>
     </form>
 	</section>
 </div>
<?php } ?>