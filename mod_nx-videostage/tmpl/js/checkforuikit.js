function checkforuikit(path,debug,$){
        if (typeof(UIkit) !== 'undefined') {
                // UIkit is loaded
                if(debug){
                    $( "div.log" ).append('### UIkit debug informations ### <br>')
                	$( "div.log" ).append('uikit is defined / loaded<br>');
                	$( "div.log" ).append(UIkit.version);
                }
        	var uikitVer = UIkit.version.substring(0,1);
        	switch(uikitVer){
        		case '3':
                    // UIkit v3 is loaded
        			if(debug){
                         $( "div.log" ).append('<br>Identified as UIkit Version 3');
                    }
        			break;
        		case '2':
                    // UIkit v2 is loaded
                    if(debug){
    	                 $( "div.log" ).append('<br>Identified as UIkit Version 2');
                    }
        			break;
        		default:
                    if(debug){
                        $( "div.log" ).append('<br>Error UIkit found but Version could not be identified<br>marked as Version '+UIkit.version);
                    }
                }
        }else{
            // UIkit is NOT loaded
            if(debug){
    	           $( "div.log" ).append('<br>UIkit is NOT defined / loaded');
                   $( "div.log" ).append('<br>Manual load from assets initiated...');
                   $( "div.log" ).append('<br>Path: '+path);
            }
            var script = path + 'js/uikit.min.js';
            var css = path + 'css/uikit.min.css';
            $('head').append('<link rel="stylesheet" type="text/css" href="'+css+'">');
            $.getScript( script )
              .done(function( script, textStatus ) {
                console.log('UIkit loaded by script, message: ' + textStatus );
                $( "div.log" ).append( "<p>" );
                $( "div.log" ).append( 'UIkit added, loaded version is: '+UIkit.version );
                $( "div.log" ).append( "</p>" );

              })
              .fail(function( jqxhr, settings, exception ) {
                $( "div.log" ).text( "Triggered ajaxError handler." );
                $( "div.log" ).append( "<p>" );
                $( "div.log" ).append( exception );
                $( "div.log" ).append( "</p>" );
            });

        }
};