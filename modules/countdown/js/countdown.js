(function($) {
	$.fn.countdown = function(options, callback) {

		//custom 'this' selector
		thisEl = $(this);

		//array of custom settings
		var settings = { 
			'date': '2 Oct 2012 14:00',
			'format': 'on'
		};

		//append the settings array to options
		if(options) {
			$.extend(settings, options);
		}
		
		//main countdown function
		function countdown_proc() {
			
			eventDate = Date.parse(settings['date']) / 1000;
			currentDate = Math.floor($.now() / 1000);
			oneDay = (Date.parse("3 Oct 2012 00:00")-Date.parse("1 Oct 2012 14:00")) / 1000;
			
			if(eventDate <= currentDate) {
			//	callback.call(this);
			//	clearInterval(interval);
				while(eventDate <= currentDate){
					eventDate += oneDay;
				}
			}
			
			seconds = eventDate - currentDate;
			
			days = Math.floor(seconds / (60 * 60 * 24)); //calculate the number of days
			seconds -= days * 60 * 60 * 24; //update the seconds variable with no. of days removed
			
			hours = Math.floor(seconds / (60 * 60));
			seconds -= hours * 60 * 60; //update the seconds variable with no. of hours removed
			
			minutes = Math.floor(seconds / 60);
			seconds -= minutes * 60; //update the seconds variable with no. of minutes removed
			
			//conditional Ss
			if (days == 1) { thisEl.find(".timeRefDays").text("день"); } else { thisEl.find(".timeRefDays").text("дней"); }
			if (hours == 1) { thisEl.find(".timeRefHours").text("час"); } else { thisEl.find(".timeRefHours").text("часов"); }
			if (minutes == 1) { thisEl.find(".timeRefMinutes").text("минута"); } else { thisEl.find(".timeRefMinutes").text("минут"); }
			if (seconds == 1) { thisEl.find(".timeRefSeconds").text("секунда"); } else { thisEl.find(".timeRefSeconds").text("секунд"); }
			
			//logic for the two_digits ON setting
			if(settings['format'] == "on") {
				days = (String(days).length >= 2) ? days : "0" + days;
				hours = (String(hours).length >= 2) ? hours : "0" + hours;
				minutes = (String(minutes).length >= 2) ? minutes : "0" + minutes;
				seconds = (String(seconds).length >= 2) ? seconds : "0" + seconds;
			}
			
			//update the countdown's html values.
			thisEl.find(".days").text(days);
			thisEl.find(".hours").text(hours);
			thisEl.find(".minutes").text(minutes);
			thisEl.find(".seconds").text(seconds);
		}
		
		//run the function
		countdown_proc();
		
		//loop the function
		interval = setInterval(countdown_proc, 1000);
		
	}
}) (jQuery);