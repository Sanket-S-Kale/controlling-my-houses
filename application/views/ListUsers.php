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
    <title>CMH-Users</title>
    <!-- Sanket Sanjaykumar Kale - 1001520314  -->
</head>

<body id="wrapper">
    <?php $this->load->view('header');?>
    <section class="row">
        <div id="nav-div" class="col-xs-12 col-md-3 col-lg-2">
            <?php $this->load->view('nav')?>
        </div>
        <div class="col-xs-12 col-md-9 col-lg-10">
<img src="<?php echo base_url();?>assets/images/users.jpg" alt="Users" class="my-img" />
<section class="p-20">
    <article>
        <h2 class="my-h2">
            Users
            <a href="<?php echo base_url();?>cmh/addUser" class="btn btn-sm float-right btn-secondary">Add User</a>
        </h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <caption>List of Users</caption>
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($users->num_rows()>0) {
                        // output data of each row
                        foreach ($users->result() as $row) {
                            echo "<tr>";
                            echo "<td>".$row->fname." ".$row->lname."</td><td>".$row->user_name."</td><td>".$row->email."</td><td>".$row->role_name."</td>";
                            echo "<td><a href=".base_url()."cmh/EditUser/".$row->user_id.">Edit</a> | <a class='text-danger' href=".base_url()."cmh/DeleteUser/".$row->user_id.">Delete</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </article>
</section>
<br/>

            <?php $this->load->view('footer'); ?>
        </div>
    </section>
</body>

</html>
<?php $this->load->view('toastMessage');?>