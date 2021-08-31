// JavaScript Document
(
   function( $ ) {
       var renderEvents = function( response ) {
           if ( response.events.length > 0 ) {   
			   var elems = '';
			   var a = 0; // Auto Increments if I need it
                for ( var event of response.events ) { 
						a++;
						/*var eventNode = $( '<li>' ); */
                    	var eventLink = event.url; // We're Good
					    var eventTitle = event.title; // We're Good new Date("2017-03-25");
						var eventDate = event.custom_fields.clean_date; // Almost Good, need to convert to month				
						if (event.custom_fields.organization_name !== 'None') {
					    	var eventOrg = event.custom_fields.organization_name; // Almost Good
						} else {
							var eventOrg = '';
						}						
						elems +='<div class="event-info"><a href="' + eventLink + '"><h3 class="event-title>' + eventTitle + '</h3></a><p class="event-time">' + eventDate + '</p><h5 class="event-org">' + eventOrg + '</h5></div>';
						$('.events').html(elems);								
						/*eventNode.text( event.title );																	
                    	eventNode.appendTo( eventsNode );*/
						//$( "h2" ).insertAfter( $( ".cell-2" ) );
						//$( ".cell-2" ).after( "</div><div class=\"row\" data-equalizer>" );
                }
            } else {
                var eventsNode = $( '' );
                eventsNode.text( 'No upcoming events found!' );
            }
            eventsNode.appendTo( $( '#rest-events' ) );
        };
        var showEvents = function() {
			var today = new Date();	
						var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
						var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
						var dateTime = date+' '+time;
            $.ajax( { 
                // get The Events Caleandar REST API root URL 
                url: restTheme.root + '/wp-json/tribe/events/v1/events/', 
                method: 'GET', 
                /*// set the `X-WP-Nonce` header to the nonce value 
                beforeSend: function( xhr ) { 
                    xhr.setRequestHeader( 'X-WP-Nonce', restTheme.nonce ); 
                },*/ 
                // set some request data 
                data: { 'page': 1, 'per_page': 4, 'start_date': dateTime} // Selects which page of events to pull, how many events per page and the start date.
            } )
            // when done render the events list 
            .done( renderEvents ); 
        };  
        $( document ).ready( function() { showEvents(); } ); 
    } 
)( jQuery );