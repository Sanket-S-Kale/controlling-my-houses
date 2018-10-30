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
    <script src="<?php echo base_url(); ?>scripts/addExpenseTypes.js"></script>
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
        <section class="p-20">
            <h2 class="my-h2">Add Expense Types</h2>
            <?php if(validation_errors()) { ?>
            <div class="alert alert-warning">
              <?php echo validation_errors(); ?>
          </div>
          <?php } ?>

          <?php if($this->session->flashdata('item')) { ?>
          <div class="alert alert-success">
              <?php echo $this->session->flashdata('item'); ?>
          </div>
          <?php } ?>
          <form name="myforms" novalidate action= <?php echo site_url('expensetypes/putexpensetypes');  ?> method="post"  onsubmit="validateForms();">

            <div class="row form-group">
                <div class="col-sm-12 col-md-2">
                    <label for="expenseType" class="control-label">
                        <span class="text-danger">*</span> Expense Type:
                    </label>
                </div>
                <div class="col-sm-12 col-md-5">
                    <input type="text" class="form-control" required id="expenseType" name="expenseType" />
                    <div id="hTypeError" class="text-danger invisible">Please Enter Expense Type</div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-12 col-md-2">
                    <label for="description" class="control-label">
                        <span class="text-danger">*</span> Description
                    </label>
                </div>
                <div class="col-sm-12 col-md-5">
                    <input type="text" class="form-control" required id="description" name="description" />
                    <div id="descriptionError" class="text-danger invisible">Please Enter Expense Description</div>
                </div>
            </div>

            <input type="submit"  name="submit" value="Add" class="col-lg-2">
        </form>

    </section>
    <br/>

            <?php $this->load->view('footer'); ?>
        </div>
    </section>
</body>

</html>
<?php $this->load->view('toastMessage');?>