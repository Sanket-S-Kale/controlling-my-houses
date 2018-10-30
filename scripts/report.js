$(document).ready(function () {
    $('#chartContainer').hide();
    $('#drpHouse').change(function () {
        // alert($('#drpHouse').val());
        if ($('#drpHouse').val() === "0") {
            $('#chartContainer').hide();
        }
        else {
			$('#chartContainer').show();
	        $.ajax({
				url: 'http://localhost/controllingmyhouses/cmh/getChartData/' + $('#drpHouse').val(),
		        type: 'POST',
		        dataType: 'json',
		        success: function (res) {
					var chart = new CanvasJS.Chart("chartContainer", {
				        animationEnabled: true,
				        title: {
					        text: "Expense Types Share"
				        },
				        data: [{
					        type: "pie",
					        startAngle: 240,
					        yValueFormatString: "##0.00\"%\"",
					        indexLabel: "{label} {y}",
					        dataPoints:res
				        }]
			        });
			        chart.render();
		        }
			});
			$.ajax({
				url: 'http://localhost/controllingmyhouses/cmh/getPaymentData/' + $('#drpHouse').val(),
		        type: 'POST',
		        dataType: 'json',
		        success: function (res) {
					var chart = new CanvasJS.Chart("payChart", {
				        animationEnabled: true,
				        title: {
					        text: "Payment Types Share"
				        },
				        data: [{
					        type: "pie",
					        startAngle: 240,
					        yValueFormatString: "##0.00\"%\"",
					        indexLabel: "{label} {y}",
					        dataPoints:res
				        }]
			        });
			        chart.render();
		        }
	        });
        }
    });
});
