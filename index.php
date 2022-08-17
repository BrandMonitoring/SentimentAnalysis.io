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
        <!-- <script src="app.js" type="text/javascript"></script> -->
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
				  <h1 class="uk-heading-line uk-text-center uk-padding-remove-top">
            <span>
              Brand Monitoring using Multimodal Sentiment Analysis
            </span>
          </h1>
					<div class="uk-child-width-expand@s uk-text-center uk-padding-remove-bottom uk-padding-remove-top uk-padding-large" uk-grid>
						<div>
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
          <?php 
          $videocheck=0;
          if($videocheck>1) { ?>
          

        <?php } 
        else { ?>
            <div class="uk-child-width-1-2 uk-text-center uk-padding" uk-grid>
                <div>
                    <div class="uk-card" style="color:lightgreen">Upload your Video File to start analysing</div>
                </div>
                <div>
                    <div class="uk-child-width-1-2 uk-text-center" uk-grid>
                        <div>
                        
                        <div class="uk-inline">
                        <a class="uk-button uk-button-default" style="color:lightblue" href="#modal-center" uk-toggle>Upload</a>
                              <!-- <div uk-dropdown>
                                  <ul class="uk-nav uk-dropdown-nav">
                                      <li>
                                      <a class="uk-button uk-button-default" style="color:black" href="#modal-center" uk-toggle>English</a> -->

                                        <div id="modal-center" class="uk-flex-top" uk-modal>
                                            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

                                                <button class="uk-modal-close-default" type="button" uk-close></button>
                                                
                                                <input  type="file" id="English" />
                                                <button class="uk-button uk-button-primary uk-margin-small-bottom" onclick="uploadEnglish()">Upload English Video</button>
                                                <input type="file" id="Hindi" />
                                                <button class="uk-button uk-button-secondary uk-margin-small-bottom " onclick="uploadHindi()">Upload Hindi Video</button>
                                                <input type="file" id="EnglishA" />
                                                <button class="uk-button uk-button-primary uk-margin-small-bottom " onclick="uploadEnglishAudio()">Upload English Audio</button>
                                                <input type="file" id="HindiA" />
                                                <button class="uk-button uk-button-secondary uk-margin-small-bottom " onclick="uploadHindiAudio()">Upload Hindi Audio</button>
                                                <input type="file" id="EnglishT" />
                                                <button class="uk-button uk-button-primary uk-margin-small-bottom " onclick="uploadEnglishText()">Upload English Text</button>
                                                <input type="file" id="HindiT" />
                                                <button class="uk-button uk-button-secondary uk-margin-small-bottom " onclick="uploadHindiText()">Upload Hindi Text</button>
                                                      <!-- Stream video via webcam -->
                                                      <p> Note: The database account limit expired. The file cannot be uploaded directly but the projects works on local machine. The screenshot is attached in the pdf.</p>
                                                  <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>
                                                  <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-storage.js"></script>

                                                <script>
                                                  var firebaseConfig = {
                                                    apiKey: "AIzaSyD2ZtFkBbiYZ10dhujJlwyWmHXs9j3W2G0",
                                                    authDomain: "sentimentanalysis-65306.firebaseapp.com",
                                                    databaseURL: "https://sentimentanalysis-65306-default-rtdb.asia-southeast1.firebasedatabase.app",
                                                    projectId: "sentimentanalysis-65306",
                                                    storageBucket: "sentimentanalysis-65306.appspot.com",
                                                    messagingSenderId: "571269398754",
                                                    appId: "1:571269398754:web:eeb1f32df548af3a8a9ebb",
                                                    measurementId: "G-74SYB1FGL9"
                                                  };
                                                  // Initialize Firebase
                                                  firebase.initializeApp(firebaseConfig);
                                                  console.log(firebase);

                                                  function uploadEnglish() {
                                                    const ref = firebase.storage().ref();
                                                    const file = document.querySelector("#English").files[0];
                                                    const name = "English_Video/"+ file.name;
                                                    const metadata = {
                                                      contentType: file.type
                                                    };
                                                    const task = ref.child(name).put(file, metadata);
                                                    task
                                                      .then(snapshot => snapshot.ref.getDownloadURL())
                                                      .then(url => {
                                                        console.log(url);
                                                        document.querySelector("#image").src = url;
                                                      })
                                                      .catch(console.error);
                                                      let id = "123";
  
                                                      let data = {};
                                                      
                                                      data["message"] = "Hello Google Firebase";
                                                      
                                                        firebase.database().ref('test/'+id).set(data,function(error) {
                                                                    if (error) {
                                                                      // The write failed...

                                                                      console.log({error});
                                                                    } else {

                                                                                          
                                                                        alert("success");
                                                                      // Data saved successfully!
                                                                    }
                                                                  });
                                                  }
                                                  function uploadEnglishAudio() {
                                                    const ref = firebase.storage().ref();
                                                    const file = document.querySelector("#EnglishA").files[0];
                                                    const name = "English_Audio/"+ file.name;
                                                    const metadata = {
                                                      contentType: file.type
                                                    };
                                                    const task = ref.child(name).put(file, metadata);
                                                    task
                                                      .then(snapshot => snapshot.ref.getDownloadURL())
                                                      .then(url => {
                                                        console.log(url);
                                                        document.querySelector("#image").src = url;
                                                      })
                                                      .catch(console.error);
                                                  }
                                                  function uploadEnglishText() {
                                                    const ref = firebase.storage().ref();
                                                    const file = document.querySelector("#EnglishT").files[0];
                                                    const name = "English_Text/"+ file.name;
                                                    const metadata = {
                                                      contentType: file.type
                                                    };
                                                    const task = ref.child(name).put(file, metadata);
                                                    task
                                                      .then(snapshot => snapshot.ref.getDownloadURL())
                                                      .then(url => {
                                                        console.log(url);
                                                        document.querySelector("#image").src = url;
                                                      })
                                                      .catch(console.error);
                                                  }
                                                  function uploadHindi() {
                                                    const ref = firebase.storage().ref();
                                                    const file = document.querySelector("#Hindi").files[0];
                                                    const name = "Hindi_Video/"+ file.name;
                                                    const metadata = {
                                                      contentType: file.type
                                                    };
                                                    const task = ref.child(name).put(file, metadata);
                                                    task
                                                      .then(snapshot => snapshot.ref.getDownloadURL())
                                                      .then(url => {
                                                        console.log(url);
                                                        document.querySelector("#image").src = url;
                                                      })
                                                      .catch(console.error);
                                                  }
                                                  function uploadHindiAudio() {
                                                    const ref = firebase.storage().ref();
                                                    const file = document.querySelector("#HindiA").files[0];
                                                    const name = "Hindi_Audio/"+ file.name;
                                                    const metadata = {
                                                      contentType: file.type
                                                    };
                                                    const task = ref.child(name).put(file, metadata);
                                                    task
                                                      .then(snapshot => snapshot.ref.getDownloadURL())
                                                      .then(url => {
                                                        console.log(url);
                                                        document.querySelector("#image").src = url;
                                                      })
                                                      .catch(console.error);
                                                  }
                                                  function uploadHindiText() {
                                                    const ref = firebase.storage().ref();
                                                    const file = document.querySelector("#HindiT").files[0];
                                                    const name = "Hindi_Text/"+ file.name;
                                                    const metadata = {
                                                      contentType: file.type
                                                    };
                                                    const task = ref.child(name).put(file, metadata);
                                                    task
                                                      .then(snapshot => snapshot.ref.getDownloadURL())
                                                      .then(url => {
                                                        console.log(url);
                                                        document.querySelector("#image").src = url;
                                                      })
                                                      .catch(console.error);
                                                  }
                                                  
                                                </script>
                                                
                                            </div>
                                        </div>
                                        <!-- <div class="js-upload" uk-form-custom>
                                            <input type="file" id="js-progressbar" multiple>
                                            <button class="uk-button uk-button-primary" type="button" tabindex="-1">
                                              English
                                            </button>
                                        </div> -->
                                      <!-- </li>
                                      <li>
                                        <div class="js-upload" uk-form-custom>
                                            <input type="file" multiple>
                                            <button class="uk-button uk-button-primary" type="button" tabindex="-1">Hindi</button>
                                        </div>
                                      </li> -->
                                  <!-- </ul> -->
                              <!-- </div> -->
                          </div>
                        </div>
                        <div>
                            <a class="uk-button uk-button-danger" href="canalysis.php">Check Sentiment</a>
                            
                <p style="color:white"> Click on check sentiment button to navigate to the output page.</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        <?php } ?>
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
