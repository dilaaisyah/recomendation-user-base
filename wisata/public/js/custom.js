$(document).ready(function(){
    
    //EQUAL HEIGHT
    var tallest = 0;
	$(window).on("load", function(){
		if ($(window).width() >  767 ) {
			$(".eqHeight").each(function() {
				var thisHeight = $(this).innerHeight();
				if(thisHeight > tallest) {
					tallest = thisHeight;
				}
			});
			$(".eqHeight").innerHeight(tallest);
		}
	});
	
});