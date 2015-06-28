<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
</head>
<body>
<div>
	<fieldset style="width:30%">
		<legend>LOGIN FORM</legend>
		<?php echo Form::open() ?> <br>
		<?php echo Form::label('username','Username') ?> <br>
		<?php echo Form::text('username') ?> <br>
		<?php echo Form::label('password','Password') ?> <br>
		<?php echo Form::password('password') ?> <br><br>
		<?php echo Form::submit('Login') ?>
		<?php Form::close() ?>
	</fieldset>
</div>
</body>
</html>