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
				  <h1 class="uk-heading-line uk-text-center uk-padding-remove-top">
            <span>
              Brand Monitoring using Multimodal Sentiment Analysis
            </span>
          </h1>
					<!-- <div class="uk-child-width-expand@s uk-text-center uk-padding-remove-bottom uk-padding-remove-top uk-padding-large" uk-grid>
						<div>
							<canvas id="myChart" width="500" height="350"></canvas>
						</div>
						<div>
							<canvas id="mChart" width="500" height="350"></canvas>
						</div>
		
					</div> -->
                    <!-- <div class="uk-child-width-expand@s uk-text-center uk-margin-small-left" uk-grid>
                            <div>
                                <div>
                            <a class="uk-button" href="#modal-container" uk-toggle>Video</a>

                                <div id="modal-container" class="uk-modal-container" uk-modal>
                                    <div class="uk-modal-dialog uk-modal-body uk-padding-large">
                                        <button class="uk-modal-close-default" type="button" uk-close></button>
                                        <h2 class="uk-modal-title">Video Analytics</h2>
                                        <p>
                                        <table class="uk-table uk-table-hover uk-table-divider"> 
                                        <thead> 
                                            <tr> 
                                            <th>File ID</th> 
                                            <th>Negative</th> 
                                            <th>Neutral</th> 
                                            <th>Positive</th> 
                                            <th>Final</th> 
                                            </tr> 
                                        </thead> 
                                        <tbody> 
                                            <?php $ref_table1="4"; 
                                            $fetchdata2 =$database->getReference($ref_table1)->getValue(); 
                                            foreach($fetchdata2 as $keys2){ 
                                            foreach($keys2 as $key2 => $row2){ ?> 
                                            <tr> <td><?php echo $row2["ID"];?></td> 
                                            <td><?php echo $row2["Angry"]+$row2["Sad"]+$row2["Fear"];?></td> 
                                            <td><?php echo $row2["Neutral"];?></td> 
                                            <td><?php echo $row2["Happy"]+$row2["Surprise"];?></td> 
                                            <td><?php if($row2["Angry"]+$row2["Sad"]+$row2["Fear"] > $row2["Neutral"]
                                            AND 
                                            $row2["Angry"]+$row2["Sad"]+$row2["Fear"]>$row2["Happy"]+$row2["Surprise"])
                                                { echo "Negative"; } 
                                                elseif($row2["Angry"]+$row2["Sad"]+$row2["Fear"] < $row2["Neutral"]
                                                AND $row2["Neutral"]>$row2["Happy"]+$row2["Surprise"]) 
                                                { echo "Neutral"; } 
                                                else{ echo "Positive"; } ?>
                                                </td> 
                                                </tr> <?php } } ?> 
                                            </tbody> 
                                            </table>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div>
                                <div>
                                <a class="uk-button uk-button-default" style="color:white;" href="#modal-full1" uk-toggle>Audio </a>

                                    <div id="modal-full1" uk-modal>
                                        <div class="uk-modal-dialog">
                                            <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                                            <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
                                                <!-- <div class="uk-background-cover" style="background-image: url('images/photo.jpg');" uk-height-viewport></div> -->
                                                <!-- <div class="uk-padding-large">
                                                    <h1>Headline</h1>
                                                    <p>Audio</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div>
                                <a class="uk-button uk-button-default" style="color:white;" href="#modal-full2" uk-toggle>Text</a>

                                    <div id="modal-full2"  uk-modal>
                                        <div class="uk-modal-dialog">
                                            <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                                            <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
                                                 <div class="uk-background-cover" style="background-image: url('images/photo.jpg');" uk-height-viewport></div> 
                                                <div class="uk-padding-large">
                                                    <h1>Headline</h1>
                                                    <p>Text</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="uk-button uk-button-default" href="analysis.php">Link</a>
                        </div>
                        <div class="uk-text-center uk-margin-large-left uk-margin-large-right" uk-grid>
                        
                        <div class="uk-width-2-3@m">
                            <div style="color:lightgreen" class="uk-card ">Upload your Video file to start the analysis</div>
                        </div>
                        <div class="uk-width-1-3@m">
                            <div class="uk-card ">
                                <div  class="js-upload" uk-form-custom>
                                    <input  type="file" multiple>
                                    <button class="uk-button uk-button-default" style="color:lightgreen" type="button" tabindex="-1">Upload </button>
                                </div>
                            </div>
                        </div>-->
                                                        
                    </div> 
        </div>
                    
    </body>
</html>
