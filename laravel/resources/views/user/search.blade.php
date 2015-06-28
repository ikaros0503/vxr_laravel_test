<!DOCTYPE <html>
<head>
	<title>SEARCH USER</title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<script type="text/javascript">
	function switchToDatePicker() {
		$('#params').get(0).type = 'date';
	}
	</script>
</head>
<body>
	<?php
	
	?>
<fieldset style="width:30%">
	<legend><b>SEARCH FORM</b></legend>
	<form action="search" id="user_search">
	<select name="type" form="user_search">
  		<option value="id">Id</option>
  		<option value="username">Username</option>
  		<option value="fullname">Fullname</option>
  		<option value="createddate">Created Date</option>
  		<option value="updateddate">Updated Date</option>
	</select> <br>Params<br>
	<input id="field" name="params" type="text">
	<input type="submit" value="Search">
	</form>
</fieldset>
<br>
<table border='1' width='100%'>
	<tr>
		<th>ID</th>
		<th>Username</th>
		<th>Fullname</th>
		<th>Created Date</th>
		<th>Updated Date</th>
		<th></th>
	</tr>
	<?php 
if (isset($_GET['type'])) {
		if (isset($_GET['params'])) {
			$type = $_GET['type'];
			$params = $_GET['params'];
			DB::setFetchMode(PDO::FETCH_ASSOC);
			switch ($type) {
				case "id":
					if (empty($params))
						$params = 0;
					else
						$params = $params;
				break;
				case "username":
				case "fullname":
					$params = "'".$params."'";
					break;
				case "createddate":
				case "updateddate":
					if (empty($params))
						$params = "'0'";
					else
					$params = "'".$params."'";
					break;
			}
			$results = DB::select('Select * from users where '.$type.'='.$params);
			DB::setFetchMode(PDO::FETCH_CLASS);
			
			foreach($results as $result) {
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
        	echo '</td></tr>';
    	}
		}
	}
    ?>
	</table>
</body>
</html>