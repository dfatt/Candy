$(document).ready(function(){
 
	var i = $('input').size() + 1;
 
	$('#add').click(function() {
		$('<div><input type="file" class="field" id="userfile_'+ i +'" name="userfile_'+ i +'" /></div>').fadeIn('slow').appendTo('.files');
		i++;
	});
 
	$('#remove').click(function() {
	if(i > 1) {
		$('.field:last').remove();
		i--;
	}
	});
 
	$('#reset').click(function() {
	while(i > 2) {
		$('.field:last').remove();
		i--;
	}
	});
 
});