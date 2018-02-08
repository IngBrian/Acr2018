<div class="content">
    <video id="video" autoplay></video>
	<button id="snap">Capture</button>
    <button id="new">New</button>
    <input type="text" name="nombre" id="nombre" size="8" >
	<canvas id="canvas" width="640" height="480"></canvas>
    <button id="upload" style="display:none;">Upload</button>
</div>

<script>
		// Put event listeners into place
		window.addEventListener("DOMContentLoaded", function() {
			// Grab elements, create settings, etc.
			var canvas = document.getElementById("canvas"),
				context = canvas.getContext("2d"),
				video = document.getElementById("video"),
				videoObj = { "video": true },
				errBack = function(error) {
					console.log("Video capture error: ", error.code); 
				};

			// Put video listeners into place
			if(navigator.getUserMedia) { // Standard
				navigator.getUserMedia(videoObj, function(stream) {
					video.src = stream;
					video.play();
				}, errBack);
			} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
				navigator.webkitGetUserMedia(videoObj, function(stream){
					video.src = window.webkitURL.createObjectURL(stream);
					video.play();
				}, errBack);
			} else if(navigator.mozGetUserMedia) { // WebKit-prefixed
				navigator.mozGetUserMedia(videoObj, function(stream){
					video.src = window.URL.createObjectURL(stream);
					video.play();
				}, errBack);
			}

			// Trigger photo take
			document.getElementById("snap").addEventListener("click", function() {
				context.drawImage(video, 0, 0, 640, 480);
				// Littel effects
				$('#video').fadeOut('slow');
				$('#canvas').fadeIn('slow');
				$('#snap').hide();
				$('#upload').show();
				// Allso show upload button
				//$('#upload').show();
			});
			
			// Capture New Photo
			document.getElementById("new").addEventListener("click", function() {
				$('#video').fadeIn('slow');
				$('#canvas').fadeOut('slow');
				$('#snap').show();
				$('#new').hide();
			});
			// Upload image to sever 
			document.getElementById("upload").addEventListener("click", function(){
				var nombre = $("#nombre").val();
				var dataUrl = canvas.toDataURL();
				$.ajax({
				  type: "POST",
				  url: "camsave.php",
				  data: { 
				"nombre": nombre,
				imgBase64: dataUrl
					
				  }
				}).done(function(msg) {
				  console.log('saved');
				  alert("Se guardo correctamente");
				 // Do Any thing you want
				});
			});
		}, false);

	</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
