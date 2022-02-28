!DOCTYPE html>
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
          </div>
          
</div>
</body>
</html>
