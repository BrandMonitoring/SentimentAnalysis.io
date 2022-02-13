<?php 
include("conn.php");
$sumangry=0;
$countAngry=0;
$ref_table="2";
$fetchdata =$database->getReference($ref_table)->getValue();
foreach($fetchdata as $keys){
	foreach($keys as $key => $row){
		if($row["Emotion"]=="Angry"){
			$countAngry=$countAngry+1;
			$sumangry=(int)$sumangry+(int)$row["Scores"];
		}
	}
}
//Echo $sume;
//echo $reference->getValue();
$username = "root";
$password = "";
$database = "project";

try {
  $pdo = new PDO("mysql:host=localhost;database=$database", $username, $password);
  // Set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
  die("ERROR: Could not connect. " . $e->getMessage());
}

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
		
		
			
			
	
		  <?php 
			// Attempt select query execution
			try{
			$sql = "SELECT * FROM project.summ";  
			$sqla = "SELECT count(ID),Sum(Scores) from project.dashboard where Emotion ='Angry'";
			$sqlh = "SELECT count(ID),Sum(Scores) from project.dashboard where Emotion ='Happy'";
			$sqln = "SELECT count(ID),Sum(Scores) from project.dashboard where Emotion ='Neutral'";
			$sqls = "SELECT count(ID),Sum(Scores) from project.dashboard where Emotion ='Sad'";
			$sqlf = "SELECT count(ID),Sum(Scores) from project.dashboard where Emotion ='Fear'";			
			$sqlsu = "SELECT count(ID),Sum(Scores) from project.dashboard where Emotion ='Surprise'";
			$ads="SELECT Sum(Scores) from project.dashboard where Emotion ='angry'";
			//$resultq = $pdo->query($sqlq);
			$result = $pdo->query($sql);
			//$rowq=$resultq->fetch();
			if($result->rowCount() > 0) {
				
				while($row = $result->fetch()) {
					$emotion[] = $row["Emotion"];
					$date[]=$row["ID"];
					$scores[]=$row["Summation"];
				}
				
			//EMOTIONS
			$resultads = $pdo->query($ads);
			$asd=$resultads->fetch();
			//echo $asd[0];
			//Angry
			$resulta = $pdo->query($sqla);
			$angry=$resulta->fetch();
			//Happy
			$resulth = $pdo->query($sqlh);
			$happy=$resulth->fetch();
			//Neutral
			$resultn = $pdo->query($sqln);
			$neutral=$resultn->fetch();
			//Sad
			$results = $pdo->query($sqls);
			$sad=$results->fetch();
			//Fear
			$resultf = $pdo->query($sqlf);
			$fear=$resultf->fetch();
				//Surprise
			$resultsu = $pdo->query($sqlsu);
			$surprise=$resultsu->fetch();
			//print_r($angry);'".$name."'
			unset($result);
			//Month
			$month1="Select Sum(scores) from project.dashboard where Month=1";
			$month2="Select Sum(scores) from project.dashboard where Month=2";
			$month3="Select Sum(scores) from project.dashboard where Month=3";
			$month4="Select Sum(scores) from project.dashboard where Month=4";
			$month5="Select Sum(scores) from project.dashboard where Month=5";
			$month6="Select Sum(scores) from project.dashboard where Month=6";
			$month7="Select Sum(scores) from project.dashboard where Month=7";
			$month8="Select Sum(scores) from project.dashboard where Month=8";
			$month9="Select Sum(scores) from project.dashboard where Month=9";
			$month10="Select Sum(scores) from project.dashboard where Month=10";
			$month11="Select Sum(scores) from project.dashboard where Month=11";
			$month12="Select Sum(scores) from project.dashboard where Month=7";
			$result1 = $pdo->query($month1);
			$jan=$result1->fetch();
			$result2 = $pdo->query($month2);
			$feb=$result2->fetch();
			$result3 = $pdo->query($month3);
			$mar=$result3->fetch();
			$result4 = $pdo->query($month4);
			$apr=$result4->fetch();
			$result5 = $pdo->query($month5);
			$may=$result5->fetch();
			$result6 = $pdo->query($month6);
			$jun=$result6->fetch();
			$result7 = $pdo->query($month7);
			$jul=$result7->fetch();
			$result8 = $pdo->query($month8);
			$aug=$result8->fetch();
			$result9 = $pdo->query($month9);
			$sep=$result9->fetch();
			$result10 = $pdo->query($month10);
			$oct=$result10->fetch();
			$result11 = $pdo->query($month11);
			$nov=$result11->fetch();
			$result12 = $pdo->query($month12);
			$dec=$result12->fetch();
			//Score
			$Hcust=$happy[0]+$surprise[0];
			$Ucust=$sad[0]+$angry[0]+$fear[0];
			$total_score=($happy[0]+$surprise[0]+$neutral[0]+$sad[0]+$fear[0]+$angry[0])*7;
			$score=($happy[1]+$surprise[1]+$neutral[1]+$sad[1]+$fear[1]+$angry[1]);
			} else {
				echo "No records matching your query were found.";
			}
			} catch(PDOException $e){
			die("ERROR: Could not able to execute $sql. " . $e->getMessage());
			}
			// Close connection
			unset($pdo);
			?>
			
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
							<span style="font-size:30px"><?php echo $Hcust ?></span><br> Happy Customers
						</div>
						<div>
							<span style="font-size:30px" style="color:green"><?php echo round(($score/$total_score)*100,2) ?>/100</span><br> Score
						</div>
						<div style="color:red">
							<span style="font-size:30px"><?php echo $Ucust ?></span><br> Unsatisfied Customers
						</div>
					</div>
				</div>
				
		</div>
  </body>
  <script>
	const angry = <?php echo json_encode($angry[0]); ?>;
	const happy = <?php echo json_encode($happy[0]); ?>;
	const neutral = <?php echo json_encode($neutral[0]); ?>;
	const sad = <?php echo json_encode($sad[0]); ?>;
	const fear = <?php echo json_encode($fear[0]); ?>;
	const surprise = <?php echo json_encode($surprise[0]); ?>;
	//months
	const jan = <?php echo json_encode($jan[0]); ?>;
	const feb = <?php echo json_encode($feb[0]); ?>;
	const mar = <?php echo json_encode($mar[0]); ?>;
	const apr = <?php echo json_encode($apr[0]); ?>;
	const may = <?php echo json_encode($may[0]); ?>;
	const jun = <?php echo json_encode($jun[0]); ?>;
	const jul = <?php echo json_encode($jul[0]); ?>;
	const aug = <?php echo json_encode($aug[0]); ?>;
	const sep = <?php echo json_encode($sep[0]); ?>;
	const oct = <?php echo json_encode($oct[0]); ?>;
	const nov = <?php echo json_encode($nov[0]); ?>;
	const dec = <?php echo json_encode($dec[0]); ?>;
	//
	  console.log(<?php echo json_encode($emotion); ?>); 
	  const emotion = <?php echo json_encode($emotion); ?>;
	  //console.log(<?php echo json_encode($date); ?>); 
	  //const date = <?php echo json_encode($date); ?>;
	  //console.log(<?php echo json_encode($scores); ?>); 
  //const scores = <?php echo json_encode($scores); ?>;
      new Chart(document.getElementById("myChart"), {
          type: 'pie',
          data: {
            labels: ["Positive","Neutral","Negative"],
            datasets: [
              {
                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
				color: "#3e95cd",
                data: [surprise+happy,neutral,fear+angry+sad]
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