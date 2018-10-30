<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>scripts/toastr.js"></script>
    <link href="<?php echo base_url(); ?>assets/css/toastr.css" rel="stylesheet"/>
    <link rel = "stylesheet" type = "text/css" 
         href = "<?php echo css_url(); ?>">
    <script type="text/javascript" src="<?php echo base_url();?>scripts/addEditHouse.js" defer></script>
    <title>CMH-Add/Edit User</title>
</head>

<body id="wrapper">
    <?php $this->load->view('header');?>
    <section class="row">
        <div id="nav-div" class="col-xs-12 col-md-3 col-lg-2">
            <?php $this->load->view('nav')?>
        </div>
        <div class="col-xs-12 col-md-9 col-lg-10">
            
<script src="<?php echo base_url();?>scripts/validateUser.js"></script>
<section class="p-20">
    <?php
    if($isAdd == TRUE){
        echo "<h2 class='my-h2'>Add User</h2>";
    } else {
        echo "<h2 class='my-h2'>Edit User</h2>";
    }
	$this->load->database();
	$form_attributes = array(
	'id' => 'addUserForm'
	);
    $lblattributes = array(
            'class' => 'control-label'
            );
	if ($isAdd == TRUE)
    {
    	echo form_open('cmh/addUser', $form_attributes, $user);
    } else{
        echo form_open('cmh/EditUser/0', $form_attributes, $user);
    }


    $data_id = array(
           'type' => 'text',
           'name' => 'id',
           'id' => 'id',
           'class' => 'form-control',
           'style' => 'display:none;',
           'value' => $user['id']
       );
    echo form_input($data_id);

    #region Email
    echo '<div class="row form-group"><div class="col-sm-12 col-md-2"><label for="email" class="control-label"><span class="text-danger">*</span> Email:</label></div><div class="col-sm-12 col-md-5">';
    $data_email = array(
           'type' => 'email',
           'name' => 'email',
           'id' => 'email',
           'class' => 'form-control',
           'required' => 'required',
           'value' => $user['email']
       );
    echo form_input($data_email);
    echo form_error('email');
    echo '</div></div>';
    #endregion

    #region fname
    echo '<div class="row form-group"><div class="col-sm-12 col-md-2"><label for="fname" class="control-label"><span class="text-danger">*</span> First Name:</label></div><div class="col-sm-12 col-md-5">';
    $data_fname = array(
           'type' => 'text',
           'name' => 'fname',
           'id' => 'fname',
           'required' => 'required',
           'value' => $user['fname'],
           'class' => 'form-control'
       );
    echo form_input($data_fname);
    echo form_error('fname');
    echo '</div></div>';
    #endregion

    #region lname
    echo '<div class="row form-group"><div class="col-sm-12 col-md-2"><label for="lname" class="control-label"><span class="text-danger">*</span> Last Name:</label></div><div class="col-sm-12 col-md-5">';
    $data_lname = array(
           'type' => 'text',
           'name' => 'lname',
           'id' => 'lname',
           'required' => 'required',
           'value' => $user['lname'],
           'class' => 'form-control'
       );
    echo form_input($data_lname);
    echo form_error('lname');
    echo '</div></div>';
    #endregion

    #region uname
    echo '<div class="row form-group"><div class="col-sm-12 col-md-2"><label for="uname" class="control-label"><span class="text-danger">*</span> User Name:</label></div><div class="col-sm-12 col-md-5">';
    $data_uname = array(
           'type' => 'text',
           'name' => 'uname',
           'id' => 'uname',
           'required' => 'required',
           'value' => $user['uname'],
           'class' => 'form-control'
       );
    echo form_input($data_uname);
    echo form_error('uname');
    echo '</div></div>';
    #endregion

    #region role
    echo '<div class="row form-group"><div class="col-sm-12 col-md-2"><label for="role" class="control-label"><span class="text-danger">*</span> Role:</label></div><div class="col-sm-12 col-md-5">';
    $data_role = array();
    if($roles->num_rows()>0){
        foreach($roles->result() as $row){
            $data_role[$row->role_id] = $row->role_name;
        }
    }
    echo form_dropdown('role',$data_role, $user['role'], array('class' => 'form-control'));
    echo form_error('role');
    echo '</div></div>';
    #endregion

    #region password
    echo '<div class="row form-group"><div class="col-sm-12 col-md-2"><label for="pass" class="control-label"><span class="text-danger">*</span> Password:</label></div><div class="col-sm-12 col-md-5">';
    $data_pass = array(
           'type' => 'password',
           'name' => 'pass',
           'id' => 'pass',
           'required' => 'required',
           'class' => 'form-control'
       );
    echo form_input($data_pass);
    echo form_error('pass');
    echo '</div></div>';
    #endregion

    #region confirm password
    echo '<div class="row form-group"><div class="col-sm-12 col-md-2"><label for="cpass" class="control-label"><span class="text-danger">*</span> Confirm Password:</label></div><div class="col-sm-12 col-md-5">';
    $data_cpass = array(
           'type' => 'password',
           'name' => 'cpass',
           'id' => 'cpass',
           'required' => 'required',
           'class' => 'form-control'
       );
    echo form_input($data_cpass);
    echo form_error('cpass');
    echo '</div></div>';

    echo '<div class="row form-group"><div class="col-sm-12 col-md-2"></div><div class="col-sm-12 col-md-5">';
    $sub_attr = array(
            'id' => 'addUser',
            'onclick'=>'return validateUser();',
            'class' => 'btn btn-secondary'
            );
    $btnName = ($isAdd == TRUE) ? "Add User" : "Update User";
    echo form_submit('addUser', $btnName, $sub_attr);
    echo '<a href="'.base_url().'cmh/users'.'" class="btn btn-primary">Cancel</a>';
    echo '</div></div>';

    #endregion

    ?>
</section>

            <br/>

            <?php $this->load->view('footer'); ?>
        </div>
    </section>
</body>

</html>
<?php $this->load->view('toastMessage');?>