<?php
session_start([
 'cookie_lifetime'=>300
]);
$_SESSION['loggedin']="";
//session_destroy();

$error=false;

if(isset($_POST['username']) && isset($_POST['password']))
{
	if('admin'==$_POST['username'] && '202cb962ac59075b964b07152d234b70' == md5($_POST['password']))
	{
		$_SESSION['loggedin']=true;
	}else
	{
		$error=true;
		$_SESSION['loggedin']=false;
	}
}

if(isset($_POST['logout']))
{
	
	$_SESSION['loggedin']=false;
	session_destroy();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>session</title>
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.css">
</head>
<body>
	<div class="container">
	<div class="row">
		<div class="column column-50 column-offset-25">
			<div>

				<div class="row">
					<div class="column column-60 column-offset-25 ">
						<?php

						echo md5("123")."<br/>";
                            if(true == $_SESSION['loggedin'])
                            {
                            	echo "hello,hi welcome";
                            }
                            else
                            {
                            	echo "hellow stranger,login below";
                            }

						?>
					</div>
				</div>
				
				<?php
				if($error)
                {
                     echo "<blockquote> error in login!!!!</blockquote>";
                }
				if( false == $_SESSION['loggedin']):;	?>

			
				<form action="" method="POST">
	         			<label for="fname" >username</label>
	         			<input type="text" name="username" id="username">
	         			<label for="password">password</label>
	         			<input type="password" name="password" id="password">
	         			<button type="submit" class="button-primary" name="submit">Save</button>
	         	</form>
	         		<?php
	         	    else:
	         		?>
	         		<form action="auth.php" method="POST">
	         			<input type="hidden" name="logout" value="1">
	         			<button type="submit" class="button-primary" name="submit">logout</button>
	         		</form>
	         		<?php
	         endif;
	         	?>
			</div>
		</div>
	</div>
</div>

</body>
</html>