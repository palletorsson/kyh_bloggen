<?php
session_start();
    if(isset($_POST['username'])){
    	if($_POST['username'] == "scrummaster" && $_POST['password'] == "1234test"){
    			
    		

	  		 $_SESSION['session_login'] = 1;  
	
	  		 $_SESSION['session_user'] = $_POST['username'];
	
	   		echo "Nu är du inloggad som ".$_POST['username'];

  			    		
    	}
		
		else{
			echo "Fel inloggingsuppgifter";
		}
   		} 
    
else {
?>



<form method="POST">
					<p>Username: <input type="text" name="username" /><br />
					Password: <input type="password" name="password" /><br />
					<input type="submit" value="Login" /></p>
				</form>
				

<?php
}
?>