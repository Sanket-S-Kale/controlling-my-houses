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
    <script type="text/javascript" defer src="<?php echo base_url();?>scripts/addEditExpenses.js"></script>
    <title>Add/Edit Expenses</title>
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
                    <h2 class="my-h2"><?php if($exp_id == 0 || $exp_id == "0"){echo 'Add ';}else{echo 'Edit ';}?>Payment
                        <a href="<?php echo base_url()?>handlePayments/index/<?php $house_id?>" class="btn btn-sm float-right btn-secondary">Back</a>
                    </h2>
                    <section>
                        <form novalidate action="<?php echo base_url()?>handlePayments/savePayment" method="post" onSubmit="return checkExpenseData();">
                            <input type="hidden" name="pay_id" value="<?php echo $pay_id;?>">
                            <input type="hidden" name="house_id" value="<?php echo $house_id;?>">
                            <div class="row form-group">
                                <div class="col-sm-12 col-md-2">
                                    <label f    or="expenseType" class="control-label">
                                        <span class="text-danger">*</span> Payment Type:
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <select required class="form-control" value="<?php echo set_value('expenseType')?>" name="expenseType" id="expenseType">
                                        <option value="">--- Select Payment Type ---</option>
                                        <?php foreach ($paymentTypes as $et) { ?>
                                        <option title="<?php echo $et->type_name;?>" value="<?php echo $et->type_id; ?>" <?php if($paymentData[0] && $paymentData[0]->type_id == $et->type_id) echo 'selected'; ?> ><?php echo $et->type_name?> </option> 
                                        <?php } ?>
                                    </select>
                                    <div id="expenseTypeError" class="text-danger invisible">Please Select Expense Type</div>
                                    <?php echo form_error('expenseType');?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-12 col-md-2">
                                    <label for="expenseInfo" class="control-label">
                                        <span class="text-danger">*</span> Payment Details:
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <input value="<?php if($paymentData[0] && $paymentData[0]->payment_info){echo set_value('expenseInfo')==FALSE?$paymentData[0]->payment_info:set_Value('expenseInfo');}else{echo set_value('expenseInfo')==FALSE?'':set_Value('expenseInfo');}?>" type="text" class="form-control" required id="expenseInfo" name="expenseInfo"/>
                                    <div id="expenseInfoError" class="text-danger invisible">Please Give Expense Details</div>
                                    <?php echo form_error('expenseInfo');?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-12 col-md-2">
                                    <label for="amount" class="control-label">
                                        <span class="text-danger">*</span> Amount:
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <input value="<?php if($paymentData[0] && $paymentData[0]->amount){echo set_value('amount')==FALSE?$paymentData[0]->amount:set_Value('amount');}else{echo set_value('amount')==FALSE?'':set_Value('amount');}?>" type="number" class="form-control" required id="amount" name="amount"/>
                                    <div id="amountError" class="text-danger invisible">Please Enter Cost of the Expense</div>
                                    <?php echo form_error('amount');?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-12 col-md-2"></div>
                                <div class="col-sm-12 col-md-5">
                                    <input type="submit" class="btn btn-secondary" value="Save">
                                    <a href="<?php echo base_url();?>handlePayments/index/<?php if($paymentData[0]){echo $paymentData[0]->house_id;}else{echo '0';}?>" class="btn btn-primary">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </section>
                </article>
            </section>
            <br/>

            <?php $this->load->view('footer'); ?>
        </div>
    </section>
</body>

</html>