<!Doctype html>
<html>
<head>
<title>USER DASHBOARD</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<?php
	DB::setFetchMode(PDO::FETCH_ASSOC);
	$results = DB::select("select * from users");
	DB::setFetchMode(PDO::FETCH_CLASS); 
?>
</head>
<body>

<h1><center>USER DASHBOARD</center></h1>
<form>
<ul id='nav-bar'>
	<li><a href='register'>Add User</a></li>
	<li><a href='search'>Search User</a></li>
	<li><a href='logout'>Logout</a></li>
</ul>
	<hr>
<table border='1' width='100%'>
	<tr>
		<th>ID</th>
		<th>Username</th>
		<th>Fullname</th>
		<th>Created Date</th>
		<th>Updated Date</th>
		<th>Tools</th>
	</tr>
	<?php foreach($results as $result) {
		echo '<tr><td>';
    	echo $result['id'];
        echo '</td><td>';
        echo $result['username'];
        echo '</td><td>';
        echo $result['fullname'];
        echo '</td><td>';
        echo $result['createddate'];
        echo '</td><td>';
        echo $result['updateddate'];
        echo '</td><td>';
        echo Form::open(array('action'=>array('UserController@edit',$result['id'])));
        echo Form::submit('Edit');
        echo Form::close();
        echo Form::open(array('action'=>array('UserController@delete',$result['id'])));
        echo Form::submit('Delete');
        echo Form::close().'</td></tr>';
    } 
    ?>
	</table>
</form>
</body>
</html>
