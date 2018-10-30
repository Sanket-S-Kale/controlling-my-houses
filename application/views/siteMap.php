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
    <title>Site Map</title>
    <!-- Sanket Sanjaykumar Kale - 1001520314  -->
</head>

<body id="wrapper">
    <?php $this->load->view('header');?>
    <section class="row">
        <div id="nav-div" class="col-xs-12 col-md-3 col-lg-2">
            <?php $this->load->view('nav')?>
        </div>
        <div class="col-xs-12 col-md-9 col-lg-10">
            <section class="p-20">
                <article>
                    <h2 class="my-h2">Site Map</h2>
                    <section>
                        <ul>
                            <li>
                                <a href="<?php echo base_url();?>home">Home</a>
                            </li>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url();?>handleExpenses/index/0">Handle Expenses</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>home/addEditHouse/0">Add House</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>home">Edit House</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>home">Delete House</a>
                                </li>
                            </ul>
                        </ul>
                        <ul>
                            <li>
                                <a href="<?php echo base_url();?>handleExpenses/index/0">Handle Expenses</a>
                            </li>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url();?>handleExpenses/addEditExpenses/0">Add Expense</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>handleExpenses/index/0">Edit Expense</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>handleExpenses/index/0">Delete Expense</a>
                                </li>
                            </ul>
                        </ul>
                        <ul>
                            <li>
                                <a href="<?php echo base_url();?>expensetypes/getexpensetypes">Expenses Types</a>
                            </li>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url();?>expensetypes/addexpensetypes">Add Expense Type</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>expensetypes/getexpensetypes">Edit Expense Type</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>expensetypes/getexpensetypes">Delete Expense Type</a>
                                </li>
                            </ul>
                        </ul>
                        <ul>
                            <li>
                                <a href="<?php echo base_url();?>handlePayments/index/0">Handle Payments</a>
                            </li>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url();?>handlePayments/addEditExpenses/0">Add Payments</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>handlePayments/index/0">Edit Payments</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>handlePayments/index/0">Delete Payments</a>
                                </li>
                            </ul>
                        </ul>
                        <ul>
                            <li>
                                <a href="<?php echo base_url();?>cmh/reports">Reports</a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="<?php echo base_url();?>cmh/users">Users</a>
                            </li>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url();?>cmh/addUser">Add User</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>cmh/users">Edit User</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>cmh/users">Delete User</a>
                                </li>
                            </ul>
                        </ul>
                    </section>
                </article>
            </section>
            <br/>

            <?php $this->load->view('footer'); ?>
        </div>
    </section>
</body>

</html>
<?php $this->load->view('toastMessage');?>