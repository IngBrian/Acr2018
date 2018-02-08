<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<title> </title>

  <style>
        a {
            color:#FFFFFF ;
            
          }


  </style>
</head>

<body>
<div class="container">
  <div class="row">
    <div class="col-lg-3 col-centered table-bordered ">
      <div class="wrath-content-box"> <span>Sign In</span> </div>
      <div class="wrath-content-box">
      <?php echo $this->Form->create('User', ['action' => 'login']); ?>
        <div class="form-group">
          
          <? echo $this->Form->input('username', array('label' => false , 'placeholder' => 'Usuario','class' => 'form-control')) ?>
        </div>
        <div class="form-group">
        	<? echo $this->Form->input('password', array('type' => 'password', 'label' => false,'class' => 'form-control' , 'placeholder' => 'Password' )) ?>

          
        </div>
       <div class="col-sm-9">
				
					<p ><a href="/users/forgot_password">  Recordar la  password</a></p>
					
				
       </div>
        <div class="col-sm-6">
          <div class="form-group text-right">
            <input type="submit" class="btn btn-success btn-sm form-control" value="Sign In" />
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
</body>
</html>