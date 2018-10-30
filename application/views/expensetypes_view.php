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
       <img class="my-img" src="<?php echo base_url(); ?>assets/images/expenses.jpg" alt="expenses" >
       <section class="p-20">
        <article>
            <h2 class="my-h2">Expense Types</h2>
            
            <a href=<?php echo site_url('expensetypes/addexpensetypes');  ?> class="btn btn-sm float-right btn-secondary">Add Expenses</a><br><br>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Expense</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($expense_types as $row):
                          echo "<tr>";
                          echo '<td>'.$row['type_name'].'</td>';
                          echo  '<td>'.$row['description'].'</td>';                          
                          echo '<td>
                          <a href="'.site_url('expensetypes/editExpenseTypes/').$row['type_id'].'">Edit</a> |
                          <a class="text-danger" href="'.site_url('expensetypes/deleteExpenseTypes/').$row['type_id'].'">Delete</a>
                          </td>';
                          echo "</tr>";

                      //echo "<option value='". $row['activityid'] ."'>" .$row['activityname'] ."</option>" ;
                      endforeach;
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