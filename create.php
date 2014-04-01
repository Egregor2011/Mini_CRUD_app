<?php 
header("Content-Type: text/html; charset=utf-8");
require_once 'class.database.php';
require_once 'cities.php';


	if ( !empty($_POST)) {
		
		$nameError = null;
		$ageError = null;
		$cityError = null;
		
		
		$name = $_POST['name'];
		$age = $_POST['age'];
		$city = $_POST['menu'];
		
		
		$valid = true;
		if (empty($name)) {
			$nameError = 'Please enter Name';
			$valid = false;
		}
		
		if (empty($age)) {
			$ageError = 'Please enter Age ';
			$valid = false;
		} 
		
		
		
		
		if ($valid) {
			$con = new database;
			$pdo = $con->connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if(empty($city)){
				$sql = "INSERT INTO users  (name,age) values(?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$age));
			}else{
			$sql = "INSERT INTO users  (name,age,city_id) values(?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$age,$city));}
			$pdo=null;
			header("Location: index.php");
		}
	}

 ?>

 <form action="create.php" method="post">
					  <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					    <label class="control-label">Name</label>
					    <div class="controls">
					      	<input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
					      	<?php if (!empty($nameError)): ?>
					      		<span class="help-inline"><?php echo $nameError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($ageError)?'error':'';?>">
					    <label class="control-label">Age</label>
					    <div class="controls">
					      	<input name="age" type="text" placeholder="Age" value="<?php echo !empty($age)?$age:'';?>">
					      	<?php if (!empty($ageError)): ?>
					      		<span class="help-inline"><?php echo $ageError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($cityError)?'error':'';?>">
					    <label class="control-label">City</label>
					    <div class="controls">
					      	<select  name="menu">
   	 				
   	 				<option selected="selected" value="">Город не выбран</option>
   	 				<?php foreach ($goal as $row) {
   	 					echo '<option value="'.$row['city_id'].'">'.$row['city'].'</option>';
   	 				} ?>
    				
    				
   						</select>
					      	
					    </div>
					  </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Create</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
					</form>
				</div>