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
    <title>Handle Expenses</title>
    <!-- Sanket Sanjaykumar Kale - 1001520314  -->
</head>

<body id="wrapper">
    <?php $this->load->view('header');?>
    <section class="row">
        <div id="nav-div" class="col-xs-12 col-md-3 col-lg-2">
            <?php $this->load->view('nav')?>
        </div>
        <div class="col-xs-12 col-md-9 col-lg-10">
            <img class="my-img" src="<?php echo houseExpensesImage_url()?>" alt="My Houses Expenses">
            <section class="p-20">
                <article>
                    <h2 class="my-h2">Payments</h2>
                    <label for="drpHouse">Select the house:</label>
                    <select required class="form-control" value="<?php echo set_value('houses')?>" name="houses" id="houses">
                        <option value="">--- Select House ---</option>
                        <?php foreach ($houses as $h) { ?>
                        <option title="<?php echo $h->house_name;?>" value="<?php echo $h->house_id; ?>" <?php if($house_id == $h->house_id) echo 'selected'; ?> ><?php echo $h->house_name.", ".$h->street.", ".$h->city.", ".$h->state." - ".$h->zip_code;?> </option> 
                        <?php } ?>
                    </select>

                    <div class="mt-2p">
                        <h4 class="my-h2">
                            <label id="lblHouseName"><?php echo $house_name;?></label>
                            <a href="<?php echo base_url(); ?>handlePayments/addEditPayments/0/<?php echo $house_id?>" class="btn btn-sm float-right btn-secondary">Add Payment</a>
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <caption>List of My Payments</caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>Payment Type</th>
                                        <th>Payment Details</th>
                                        <th>Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if(sizeof($housePayments)>=1){
                                            foreach ($housePayments as $he) {
                                                echo "<tr>";
                                                echo "<td>".$he->created_date."</td>";
                                                echo "<td>".$he->type_name."</td>";
                                                echo "<td>".$he->payment_info."</td>";
                                                echo "<td>".$he->amount."</td>";
                                                echo '<td>
                                                    <a href="'.base_url().'handlePayments/addEditPayments/'.$he->pay_id.'">Edit</a> |
                                                    <a class="text-danger" href="'.base_url().'handlePayments/deletePayment/'.$he->pay_id.'">Delete</a>
                                                    </td>';
                                                echo "</tr>";
                                            }
                                        }else{
                                            echo "<tr>";
                                            echo "<td colspan='5' class='text-center'>No data to display.</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </article>
            </section>
            <br/>

            <?php $this->load->view('footer'); ?>
        </div>
    </section>
</body>

</html>

<script type="text/javascript">
    $('#houses').change(function(){
        var houseId = $(this).val();
        $(location).attr('href','<?php echo base_url();?>handlePayments/index/'+houseId);
    }); 
</script>

<?php $this->load->view('toastMessage');?>