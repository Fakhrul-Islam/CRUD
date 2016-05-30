<?php

spl_autoload_register(function($class){
	include_once 'core/'.$class.'.php';
});

$read = new Read();
$i = 0;

if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
	$name = $_POST['name'];
	$age = $_POST['age'];
	$profession = $_POST['profession'];
	$insert = new Insert();
	$insert->setName($name);
	$insert->setAge($age);
	$insert->setProf($profession);
	$insertData = $insert->insertData();
	if($insertData){
		$insertN = 'Data Insert Successfull';
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD | Create Read Update Delete</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="myDiv">
				<div class="myForm col-md-6">
					<h2 class="text-center">Simple Form</h2>
					<p class="text-success"><?php if(!empty($insertN)){echo $insertN;} ?></p>
					<form action="index.php" method="POST" class="form">
						<div class="form-group">
							<label for="name">Name : </label>
							<input type="text" name="name" class="form-control" id="name">
						</div>
						<div class="form-group">
							<label for="age">Age : </label>
							<input type="number" name="age" class="form-control" id="age">
						</div>
						<div class="form-group">
							<label for="profession">Profession : </label>
							<input type="text" name="profession" class="form-control" id="profession">
						</div>
						<button class="btn btn-success pull-center">Enter</button>
					</form>
				</div>
				<div class="myData col-md-6 pull-right">
					<h2 class="text-center">Your Information</h2>
					<table class=" table table-bordered table-striped">
						<thead>
							<th></th>
							<th>Name</th>
							<th>Age</th>
							<th>Profession</th>
							<th>Option</th>
						</thead>
						<tbody>
						<?php foreach( $read->readAll('person') as $person ): ?>
							<?php $i++ ;?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $person['name']; ?></td>
								<td><?php echo $person['age']; ?></td>
								<td><?php echo $person['profession']; ?></td>
								<td>
									<a href="<?php echo $person['id']; ?>"><button class="btn btn-default">Edit</button></a>
									<a href="<?php echo $person['id']; ?>"><button class="btn btn-default">Delete</button></a>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>