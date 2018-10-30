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
    <title>My Homes</title>
    <!-- Sanket Sanjaykumar Kale - 1001520314  -->
</head>

<body id="wrapper">
    <?php $this->load->view('header');?>
    <section class="row">
        <div id="nav-div" class="col-xs-12 col-md-3 col-lg-2">
            <?php $this->load->view('nav')?>
        </div>
        <div class="col-xs-12 col-md-9 col-lg-10">
            <img class="my-img" src="<?php echo houseImage_url()?>" alt="My Houses">
            <section class="p-20">
                <article>
                    <h2 class="my-h2">My Homes
                        <a href="<?php echo base_url()?>home/addEditHouse/0" class="btn btn-sm float-right btn-secondary">Add House</a>
                    </h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <caption>List of My Houses</caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th>House Name</th>
                                        <th>Address</th>
                                        <th>Cost</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($houses as $h) {
                                            echo "<tr>";
                                            echo "<td>".$h->house_name."</td>";
                                            echo "<td>".$h->street.", ".$h->city.", ".$h->state." - ".$h->zip_code."</td>";
                                            echo "<td>$".$h->initial_cost."</td>";
                                            echo '<td>
                                                    <a href="'.base_url().'handleExpenses/index/'.$h->house_id.'">Handle Expenses</a> |
                                                    <a href="'.base_url().'home/addEditHouse/'.$h->house_id.'">Edit</a> |
                                                    <a class="text-danger" href="'.base_url().'home/deleteHouse/'.$h->house_id.'">Delete</a>
                                                </td>';
                                            echo "</tr>";
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