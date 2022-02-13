<?php 
include("conn.php");
include("firebasedata.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/css/uikit.min.css" />
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit-icons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <script src="https://d3js.org/d3.v4.min.js"></script>
		<style>
			body {
				font-family: 'Montserrat', sans-serif;
				font-size: 20px;
			}
		</style>
  </head>
  <body>			
			<div class="uk-child-width-1@s uk-text-center uk-margin-remove-bottom uk-padding-remove-bottom" uk-grid>
				<div class="uk-background-secondary uk-light uk-padding uk-panel">
				<h1 class="uk-heading-line uk-text-center uk-padding-remove-top"><span>Brand Monitoring using Multimodal Sentiment Analysis</span></h1>
					<div class="uk-child-width-expand@s uk-text-center uk-padding-remove-bottom uk-padding-remove-top uk-padding-large" uk-grid>
						<div >
							<canvas id="myChart" width="500" height="350"></canvas>
						</div>
						<div>
							<canvas id="mChart" width="500" height="350"></canvas>
						</div>
		
					</div>
					<div class="uk-child-width-expand@s uk-text-center uk-padding-large uk-padding-remove-bottom uk-padding-remove-top" uk-grid>
						<div style="color:green" class="uk-margin-remove-bottom uk-padding-remove-bottom">
							<span style="font-size:30px"><?php echo $countPositive ?></span><br> Happy Customers
						</div>
						<div>
							<span style="font-size:30px" style="color:green"><?php echo round(($score/$total_score)*100,2) ?>/100</span><br> Score
						</div>
						<div style="color:red">
							<span style="font-size:30px"><?php echo $countNegative ?></span><br> Unsatisfied Customers
						</div>
					</div>
				</div>
				
		</div>
  </body>
  <script>
	const negative = <?php echo $countNegative; ?>;
	const positive = <?php echo $countPositive; ?>;
	const neutral = <?php echo $countNeutral; ?>;
	//months
	const jan = <?php echo $jan; ?>;
	const feb = <?php echo $feb; ?>;
	const mar = <?php echo $mar; ?>;
	const apr = <?php echo $apr; ?>;
	const may = <?php echo $may; ?>;
	const jun = <?php echo $jun; ?>;
	const jul = <?php echo $jul; ?>;
	const aug = <?php echo $aug; ?>;
	const sep = <?php echo $sep; ?>;
	const oct = <?php echo $oct; ?>;
	const nov = <?php echo $nov; ?>;
	const dec = <?php echo $dec; ?>;
	//

      new Chart(document.getElementById("myChart"), {
          type: 'pie',
          data: {
            labels: ["Positive","Neutral","Negative"],
            datasets: [
              {
                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
				color: "#3e95cd",
                data: [positive,neutral,negative]
              }
            ]
          },
          options: {
            responsive: false,
            //legend: { display: false },
            title: {
              display: true,
              text: 'Distribution'
            }
          }
      });
    
      new Chart(document.getElementById("mChart"), {
          type: 'line',
          data: {
            labels: ["Jul","Aug","Sep","Oct","Nov","Dec","Feb"],
            datasets: [
              {
                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#c45850"],
				color: "(0,0,255)",
                data: [jul,aug,sep,oct,nov,dec,feb],
                lineTension:0.1,
                fill: false,
                borderColor: "rgb(275,175,192)",
				hoverBackgroundColor: "rgb(275,175,192)",
				pointBackgroundColor:"rgb(275,175,92)",
				BackgroundColor:"rgb(275,175,92)",
              }
            ]
          },
          options: {
            responsive: false,
            legend: { display: false,
					labels: {
                    color: "rgb(555,55,255)"
                }
				},
            title: {
              display: true,
              text: 'Performance'
            },
			scales: {
      xAxes: [{
        display: true,
        gridLines: {
          display: true,
		  color: "#FFFFFF"
        },
        scaleLabel: {
          display: true,
		  color: "#FFFFFF"
        }
      }],
      yAxes: [{
        display: true,
        gridLines: {
          display: true,
		  color: "#FFFFFF"
        },
        scaleLabel: {
          display: true,
		  color: "#FFFFFF"
        }
      }]
    }
          }
      });
      

    </script>
</html>