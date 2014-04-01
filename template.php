<?php require_once('def.php'); 

$init = new User;
$data = $init->GetAllUsers();
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Userlist</title>
	<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script>
		function show()  
        {  
            $.ajax({  
                url: "time.php",  
                cache: false,  
                success: function(html){  
                    $("#content").html(html);  
                }  
            });  
        }  

		$(document).ready(function(){
			show();  
            setInterval('show()',1000);
			$('.load').click(function(){
				
			});
		});
	</script>
</head>
<body>

	<h1>User list</h1>

	<a href="create.php">New user</a>

	<div class="table">
		 <table border="1">
   <tr>
    <th>Name</th>
    <th>Age</th>
    <th>City</th>
   </tr>
   <?php foreach ($data as $row) {
   	echo '<tr>';
   	echo '<td class="load"><div class="first">'.$row['name'].'</div></td>';
   	echo '<td class="load"><div class="second">'.$row['age'].'</div></td>';
   	echo '<td class="load"><div class="third">'.$row['city'].'</div></td>';
   	echo '</tr>';
   } ?>
 </table>

	</div>
	

	
</body>
</html>