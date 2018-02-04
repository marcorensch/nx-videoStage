// Functions to setup the player

function enableAmbilight(src,canvas,setup,debug,$,callback)
{
	/*

		src			string 		id of the player
		canvas 		string 		id of the canvas element
		setup 		array 		settings for this player

	*/
	if(debug){
		console.log('Ambilight Script embedded');
		console.log('Configuration for nx-videoStage with Ambilight:');
		console.log(setup);
		console.log("Source: "+src);
		console.log("Canvas: "+canvas);
	}
	var timerID;
	
	canvas = document.getElementById(canvas);
	ctx = canvas.getContext('2d');

	var video = document.getElementById(src);

	video.addEventListener('play', function() {
		//video.currentTime = 0;
		timerID = window.setInterval(function() {
		ctx.drawImage(video, 0, 0, 600, 460)
		}, 30);
	});
	callback($)
}