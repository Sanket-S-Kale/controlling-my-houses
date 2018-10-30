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
            <img class="my-img" src="<?php echo houseImage_url();?>" alt="My Houses">
            <section class="p-20">
                <article>
                    <h2 class="my-h2"><?php if($house_id == 0 || $house_id == "0"){echo 'Add ';}else{echo 'Edit ';}?>Hosue
                        <a href="<?php echo base_url()?>home" class="btn btn-sm float-right btn-secondary">Back</a>
                    </h2>
                    <section>
                        <form novalidate action="<?php echo base_url();?>home/saveHouse" method="post" onSubmit="return checkHouseData();">
                            <input type="hidden" name="house_id" value="<?php echo $house_id;?>">
                            <!-- <div class="row form-group">
                                <div class="col-sm-12 col-md-2">
                                    <label for="owner" class="control-label">
                                        <span class="text-danger">*</span> Owner:
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <select required class="form-control" value="<?php echo set_value('owner')?>" name="owner" id="owner">
                                        <option value="">--- Select Owner ---</option>
                                        <?php foreach ($owners as $o) { ?>
                                        <option title="<?php echo $o->fname.' '.$o->lname;?>" value="<?php echo $o->user_id; ?>" <?php if($houseData[0] && $houseData[0]->owner_id == $o->user_id) echo 'selected'; ?> ><?php echo $o->fname.' '.$o->lname?> </option> 
                                        <?php } ?>
                                    </select>
                                </div>
                            </div> -->
                            <div class="row form-group">
                                <div class="col-sm-12 col-md-2">
                                    <label for="accountant" class="control-label">
                                        <span class="text-danger">*</span> Accountant:
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <select required class="form-control" value="<?php echo set_value('accountant')?>" name="accountant" id="accountant">
                                        <option value="">--- Select accountant ---</option>
                                        <?php foreach ($accountants as $o) { ?>
                                        <option title="<?php echo $o->fname.' '.$o->lname;?>" value="<?php echo $o->user_id; ?>" <?php if($houseData[0] && $houseData[0]->accountant_id == $o->user_id) echo 'selected'; ?> ><?php echo $o->fname.' '.$o->lname?> </option> 
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-12 col-md-2">
                                    <label for="houseName" class="control-label">
                                        <span class="text-danger">*</span> House Name:
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <input value="<?php if($houseData[0] && $houseData[0]->house_name){echo set_value('houseName')==FALSE?$houseData[0]->house_name:set_Value('houseName');}else{echo set_value('houseName')==FALSE?'':set_Value('houseName');}?>" type="text" class="form-control" required id="houseName" name="houseName" />
                                    <div id="hNameError" class="text-danger invisible">Please Enter House Name</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-12 col-md-2">
                                    <label for="address" class="control-label">
                                        <span class="text-danger">*</span> Address:
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <input value="<?php if($houseData[0] && $houseData[0]->street){echo set_value('address')==FALSE?$houseData[0]->street:set_Value('address');}else{echo set_value('address')==FALSE?'':set_Value('address');}?>" type="text" class="form-control" type="text" class="form-control" required id="address" name="address" />
                                    <div id="addressError" class="text-danger invisible">Please Enter House Address</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-12 col-md-2">
                                    <label for="city" class="control-label">
                                        <span class="text-danger">*</span> City:
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <input value="<?php if($houseData[0] && $houseData[0]->city){echo set_value('city')==FALSE?$houseData[0]->city:set_Value('city');}else{echo set_value('city')==FALSE?'':set_Value('city');}?>" type="text" class="form-control" required id="city" name="city" />
                                    <div id="cityError" class="text-danger invisible">Please Enter City</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-12 col-md-2">
                                    <label for="state" class="control-label">
                                        <span class="text-danger">*</span> State:
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <input value="<?php if($houseData[0] && $houseData[0]->state){echo set_value('state')==FALSE?$houseData[0]->state:set_Value('state');}else{echo set_value('state')==FALSE?'':set_Value('state');}?>" type="text" class="form-control" required id="state" name="state" />
                                    <div id="stateError" class="text-danger invisible">Please Enter State</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-12 col-md-2">
                                    <label for="zip" class="control-label">
                                        <span class="text-danger">*</span> Zip Code:
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <input value="<?php if($houseData[0] && $houseData[0]->zip_code){echo set_value('zip')==FALSE?$houseData[0]->zip_code:set_Value('zip');}else{echo set_value('zip')==FALSE?'':set_Value('zip');}?>" type="text" class="form-control" required id="zip" name="zip" />
                                    <div id="zipError" class="text-danger invisible">Please Enter zip code</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-12 col-md-2">
                                    <label for="amount" class="control-label">
                                        <span class="text-danger">*</span> Initial Cost:
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <input value="<?php if($houseData[0] && $houseData[0]->initial_cost){echo set_value('amount')==FALSE?$houseData[0]->initial_cost:set_Value('amount');}else{echo set_value('amount')==FALSE?'':set_Value('amount');}?>" type="number" class="form-control" required id="amount" name="amount" />
                                    <div id="amountError" class="text-danger invisible">Please Enter cost</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-12 col-md-2"></div>
                                <div class="col-sm-12 col-md-5">
                                    <input class="btn btn-secondary" value="Save" type="submit"/>
                                    <a href="<?php echo base_url();?>home" class="btn btn-primary">Cancel</a>
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
<?php $this->load->view('toastMessage');?>