<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ma galerie FlexMasonry</title>

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{asset('frontend/assets/js/freewall.js')}}"></script>
<style type="text/css">
    .free-wall {
    margin: 15px;
}
    #container {
      width: 80%;
      margin: auto;
    }
    .item 
    {
        width: 33%;
    }
    .item img {
				margin: 0;
				display: block;
			}
  </style>

</head>
<body>
<div id="container">
        <div class="item"><img src="https://mysecretmap.s3.eu-central-1.wasabisys.com/medium/medium-64575678424c0_1___DSC0389-Panorama-header.jpg" width="100%" alt=""></div>
        <div class="item"><img src="https://mysecretmap.s3.eu-central-1.wasabisys.com/medium/medium-64575678af943_1___DSC0338-header.jpg"  width="100%" alt=""></div>
        <div class="item"><img src="https://mysecretmap.s3.eu-central-1.wasabisys.com/medium/medium-6457567cbcf4e_1___DSC1598-header.jpg"  alt=""></div>
        <div class="item"><img src="https://mysecretmap.s3.eu-central-1.wasabisys.com/medium/medium-6457567e344b6_1___DSC1598-Panorama-header.jpg"  width="100%" alt=""></div>
        <div class="item"><img src="https://mysecretmap.s3.eu-central-1.wasabisys.com/medium/medium-6457c13303b73_1___DSC3204-header.jpg" width="100%" alt=""></div>
        <div class="item"><img src="https://mysecretmap.s3.eu-central-1.wasabisys.com/medium/medium-6457c1336da0a_1___DSC3099-header.jpg" width="100%" alt=""></div>
        <div class="item"><img src="https://mysecretmap.s3.eu-central-1.wasabisys.com/medium/medium-6457c137b9601_1___DSC8281-header.jpg"  width="100%" alt=""></div>
        <div class="item"><img src="https://mysecretmap.s3.eu-central-1.wasabisys.com/medium/medium-6457c13a7ec0b_1___DSC8281-panorama-header.jpg"  width="100%" alt=""></div>
        <div class="item"><img src="https://mysecretmap.s3.eu-central-1.wasabisys.com/medium/medium-6457c13c1a974_1___DSC8281-header.jpg"  width="100%" alt=""></div>
        <div class="item"><img src="https://mysecretmap.s3.eu-central-1.wasabisys.com/medium/medium-6457c13e6b178_1___DSC8305-header.jpg"  width="100%" alt=""></div>
</div>
<script>

    


var wall = new Freewall("#container");

wall.reset({
				selector: '.item',
				animate: true,
				cellW: 150,
				cellH: 'auto',
                gutterX: 2,
                gutterY: 2,
				onResize: function() {
					wall.fitWidth();
				}
			});

			var images = wall.container.find('.item');
      

			images.find('img').on('load', function() {
				wall.fitWidth();
                
			});
   
</script>
<style>

</style>
</body>
</html>
