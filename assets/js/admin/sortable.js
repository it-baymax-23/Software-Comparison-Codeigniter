$().ready(function(){
	var ns = $('ol.sortable').nestedSortable({
		forcePlaceholderSize: true,
		handle: 'div',
		helper:	'clone',
		items: 'li',
		opacity: .6,
		placeholder: 'placeholder',
		revert: 250,
		tabSize: 25,
		tolerance: 'pointer',
		toleranceElement: '> div',
		maxLevels: 4,
		isTree: true,
		expandOnHover: 700,
		startCollapsed: false,
		change: function(){
			console.log('Relocated item');
		}
	});
		
	$('.expandEditor').attr('title','Click to show/hide item editor');
	$('.disclose').attr('title','Click to show/hide children');
	$('.deleteMenu').attr('title', 'Click to delete item.');

	$(document).on('click','.expandEditor, .itemTitle',function(){
		var id = $(this).attr('data-id');
		$('#menuEdit'+id).toggle();
		$(this).toggleClass('ui-icon-triangle-1-n').toggleClass('ui-icon-triangle-1-s');
	})
	
	$(document).on('click','.disclose',function(){
		$(this).closest('li').toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');
		$(this).toggleClass('ui-icon-plusthick').toggleClass('ui-icon-minusthick');
	})
	
	$(document).on('click','.deleteMenu',function(){
		var id = $(this).attr('data-id');
		$('#menuItem_'+id).remove();
		$('.sortable').find('li').each(function(index){
			index++;
			$(this).attr('id','menuItem_' + index);
			$(this).find('.menuDiv').eq(0).find('[data-id]').each(function(){
				$(this).attr('data-id',index);
			})

			$(this).find('.menuDiv').eq(0).find('.menuEdit').eq(0).attr('id','menuEdit'+index);
		})
	})
	
	
});			

function dump(arr,level) {
	var dumped_text = "";
	if(!level) level = 0;

	//The padding given at the beginning of the line.
	var level_padding = "";
	for(var j=0;j<level+1;j++) level_padding += "    ";

	if(typeof(arr) == 'object') { //Array/Hashes/Objects
		for(var item in arr) {
			var value = arr[item];

			if(typeof(value) == 'object') { //If it is an array,
				dumped_text += level_padding + "'" + item + "' ...\n";
				dumped_text += dump(value,level+1);
			} else {
				dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
			}
		}
	} else { //Strings/Chars/Numbers etc.
		dumped_text = "===>"+arr+"<===("+typeof(arr)+")";
	}
	return dumped_text;
}