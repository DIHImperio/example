$(document).ready(function() 
{
	var change = 0; // значение right
	
	$('.nextbutton').click(function(){
		
		if(change < 2160){
			change = change + 1080;
			// если это последний слайд, стрелка скрывается
			if (change == 2160) {$('.nextbutton').hide();}else{$('.nextbutton').show();} 
			if (change == 0) {$('.prewbutton').hide();}else{$('.prewbutton').show();}
        	$('.slider').css({'right':change}); // изменение right у slider
        }
        
               
    })
$('.prewbutton').click(function(){
		if(change > 0){
        	change = change - 1080;
			if (change == 2160) {$('.nextbutton').hide();}else{$('.nextbutton').show();}
			if (change == 0) {$('.prewbutton').hide();}else{$('.prewbutton').show();}
        	$('.slider').css({'right':change});
        }       
    })
});