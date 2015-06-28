<!DOCTYPE <html>
<head>
	<title>EDIT USER</title>
</head>
<body>
<?php
use \App\User; 
$user = User::find($id);
?>

<fieldset style="width:30%">
		<legend><b>EDIT FORM</b></legend>
		<?php echo Form::open(array('action'=>array('UserController@update',$id))) ?> <br>
		<?php echo Form::label('username','Username') ?> <br>
		<?php echo Form::text('username',$user['username']) ?> <br>
		<?php echo Form::label('password','Password') ?> <br>
		<?php echo Form::password('password') ?> <br>
		<?php echo Form::label('fullname','Fullname')?> <br>
		<?php echo Form::text('fullname',$user['fullname']) ?> <br><br>
		<?php echo Form::submit('Save') ?>
		<?php Form::close() ?>
	</fieldset>
</body>
</html>