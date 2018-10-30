
    <nav>
        <?php
        if($this->session->userdata('role_id') == "1"){
        ?>
    
    <a href="<?php echo base_url();?>cmh/users">Users</a>
    <br class="d-none d-md-block d-lg-block" />
    <a href="<?php echo base_url();?>login_controller/logout">Log Out</a>

    <?php }else if ($this->session->userdata('role_id') == "2") {
     # code...
        ?>
    <a href="<?php echo base_url(); ?>home">Home</a>
    <br class="d-none d-md-block d-lg-block" />
    <a href="<?php echo base_url();?>handleExpenses">Handle Expenses</a>
    <br class="d-none d-md-block d-lg-block" />
    <a href="<?php echo site_url('expensetypes/getexpensetypes'); ?>">Expense Types</a>
    <br class="d-none d-md-block d-lg-block" />
    <a href="<?php echo base_url();?>handlePayments">Handle Payments</a>
    <br class="d-none d-md-block d-lg-block" />
    <a href="<?php echo base_url();?>cmh/reports">Reports</a>
    <br class="d-none d-md-block d-lg-block" />
    <a href="<?php echo base_url();?>login_controller/logout">Log Out</a>
    <?php
 }else if ($this->session->userdata('role_id') == "3"){
    ?>
    
    <a href="<?php echo base_url();?>handleExpenses">Handle Expenses</a>
    <br class="d-none d-md-block d-lg-block" />
    <a href="<?php echo site_url('expensetypes/getexpensetypes'); ?>">Expense Types</a>
    <br class="d-none d-md-block d-lg-block" />
    <a href="<?php echo base_url();?>handlePayments">Handle Payments</a>
    <br class="d-none d-md-block d-lg-block" />
    <a href="<?php echo base_url();?>cmh/reports">Reports</a>
    <br class="d-none d-md-block d-lg-block" />
    
    <a href="<?php echo base_url();?>login_controller/logout">Log Out</a>
    <?php
 }
?>
    </nav>
