<!DOCTYPE html>
<html>
<head>
	<title>REGISTER PAGE</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
</head>
<body>
<div>
	<fieldset style="width:30%">
		<legend><b>REGISTER FORM</b></legend>
		<?php echo Form::open() ?> <br>
		<?php echo Form::label('username','Username') ?> <br>
		<?php echo Form::text('username') ?> <br>
		<?php echo Form::label('password','Password') ?> <br>
		<?php echo Form::password('password') ?> <br>
		<?php echo Form::label('fullname','Fullname')?> <br>
		<?php echo Form::text('fullname') ?> <br> <br>
		<?php echo Form::submit('Register') ?> 
		<?php Form::close() ?>
	</fieldset>
</div>
</body>
</html>