<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D"
        crossorigin="anonymous"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="<?php echo base_url();?>scripts/report.js"></script>
    <script src="<?php echo base_url(); ?>scripts/toastr.js"></script>
    <link href="<?php echo base_url();?>assets/css/toastr.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo css_url();?>">
    <title>CMH-Reports</title>
</head>

<body id="wrapper">
    <?php $this->load->view('header');?>
    <section class="row">
        <div id="nav-div" class="col-xs-12 col-md-3 col-lg-2">
            <?php $this->load->view('nav'); ?>
        </div>
        <div class="col-xs-12 col-md-9 col-lg-10">

            <img src="<?php
echo base_url();
?>assets/images/Reports.jpg" class="my-img" alt="house">
            <main class="p-20">
                <h2 class="my-h2">Reports</h2>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="chart-tab" data-toggle="tab" href="#chart" role="tab" aria-controls="chart" aria-selected="true">Each House</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="grid-tab" data-toggle="tab" href="#grid" role="tab" aria-controls="grid" aria-selected="false">All Houses</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="chart" role="tabpanel" aria-labelledby="chart-tab">
                        <br>
                        <label for="drpHouse">Select the house:</label>
                        <select required class="form-control" value="<?php echo set_value('drpHouse')?>" name="drpHouse" id="drpHouse">
                            <option value="">--- Select House ---</option>
                            <?php foreach ($houses as $h) { ?>
                            <option title="<?php echo $h->house_name;?>" value="<?php echo $h->house_id; ?>" <?php if($house_id==$h->house_id) echo 'selected'; ?> >
                                <?php echo $h->house_name.", ".$h->street.", ".$h->city.", ".$h->state." - ".$h->zip_code;?> </option>
                            <?php } ?>
                        </select>
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                        <div id="payChart" style="height: 370px; width: 100%;"></div>
                    </div>
                    <div class="tab-pane fade" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>House Name</th>
                                        <th>Cost</th>
                                        <th>All Expenses</th>
                                        <th>Net Worth</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
if ($grid->num_rows() > 0) {
    // output data of each row
    foreach ($grid->result() as $row) {
        echo "<tr>";
        $total = 0;
        $total = (floatval($row->initial_cost) + floatval($row->sum));
        echo "<td>" . $row->house_name . "</td><td>$" . $row->initial_cost . "</td><td>$" . $row->sum . "</td><td>$" . $total . "</td>";
        echo "</tr>";
    }
}
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <br/>

            <?php
$this->load->view('footer');
?>
        </div>
    </section>
</body>

</html>
<?php
$this->load->view('toastMessage');
?>