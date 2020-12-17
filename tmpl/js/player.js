// Functions to setup the player

function setParameters(target,setting,debug,$)
{
	if(debug){
		console.log('Player Setup:')
		console.log(target);
		console.log(setting);
	}
	$('#'+target).prop("volume", setting['vol']);
}