window.onload = function(){
	$("#loading").fadeOut(500);
}

$(document).ready(function(){
	
	$('a').click(function(){
		if($(this).attr('href') == base_url + 'categories')
		{
			if($('#categories').css('display') == 'none')
			{
				var html = $(this).html();
				$(this).find('i').eq(0).removeClass('fa-angle-down');
				$(this).find('i').eq(0).addClass('fa-angle-up');
				$('#categories').slideDown('slow');	
			}
			else
			{
				$(this).find('i').eq(0).removeClass('fa-angle-up');
				$(this).find('i').eq(0).addClass('fa-angle-down');
				$('#categories').slideUp('slow');		
			}
			return false;
		}
	})
	$('.category_search').keyup(function(){
		$('.category_list').find('li').each(function(){
			$(this).hide();
		})

		var search_text = $(this).val();
		console.log(search_text);
		if(!search_text)
		{
			$('.category_list').find('.branch').each(function(){
				$(this).show();
				if($(this).find('.sub').length > 0)
				{
					$(this).find('.sub').eq(0).hide();
					$(this).find('.sub').eq(0).find('li').each(function(){
						$(this).show();
					})
				}

				$(this).find('.fas').eq(0).removeClass('fa-minus');
				$(this).find('.fas').eq(0).addClass('fa-plus');
			})

			return;
		}

		$('.category_list').find('a').each(function(){
			var element_text = $(this).html();
			if(element_text && element_text.toLowerCase().indexOf(search_text.toLowerCase()) >= 0)
			{
				$(this).parents('li').show();
				$(this).parents('ul').show();
				$(this).parents('ul').parents('li').show();
				$(this).parents('ul').parents('li').find('i').eq(0).attr('class','fas fa-minus');
			}
		})
	})
})



