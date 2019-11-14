var index = 1;
$(document).on('click','.add_menu',function(){
	var element = $(this).parents('.card-body');
	var type = element.attr('attr_type');
	var pagesetting = [];
	if(type == 'page')
	{
		element.children().eq(0).find('input[type=checkbox]').each(function(){
			if($(this)[0]['checked'])
			{
				var id = $('.sortable').find('li').length;
				id++;
				var html = '<li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded" id="menuItem_' + id + '" data-foo="bar"><div class="menuDiv"><span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick"><span></span></span><span title="Click to show/hide item editor" data-id="' + id + '" class="expandEditor ui-icon ui-icon-triangle-1-n"><span></span></span><span><span data-id="' + id + '" class="itemTitle">' + $(this).attr('attr_title') + '</span>';

				html += '<span title="Click to delete item." data-id="' + id + '" class="deleteMenu ui-icon ui-icon-closethick"><span></span></span><span class="itemType" style="float:right;margin-right:30px;">page</span></span><div id="menuEdit' + id + '" class="menuEdit hidden"><input type="hidden" class="form-control" value="' + $(this).attr('attr_href') + '" name="href"/><input type="hidden" class="form-control" value="page" name="type"/><div class="row" style="margin:10px 10px;"><label class="col-lg-12" style="margin-bottom:0px;font-size:12px;color:black;font-style:italic">Navigation Label</label><input type="text" class="form-control" value="' + $(this).attr('attr_title') + '" name="title"></div></div></div></li>';

				$('.sortable').append(html);
			}
		})

		element.children().eq(0).find('input[type=checkbox]').each(function(){
			$(this)[0]['checked'] = false;
		})
	}
	else
	{
		var htmlelement = {};
		var enable = true;
		element.children().eq(0).find('.form-control').each(function(){
			htmlelement[$(this).attr('name')] = $(this).val();
			if(!$(this).val())
			{
				toastr['error']('You must input into ' + $(this).attr('name'),'Error');
				enable = false;
			}
		})

		if(enable)
		{
			var id = $('.sortable').find('li').length;
			
			id++;
			var html = '<li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded" id="menuItem_' + id + '" data-foo="bar"><div class="menuDiv"><span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick"><span></span></span><span title="Click to show/hide item editor" data-id="' + id + '" class="expandEditor ui-icon ui-icon-triangle-1-n"><span></span></span><span><span data-id="' + id + '" class="itemTitle">' + htmlelement['title'] + '</span>';

			html += '<span title="Click to delete item." data-id="' + id + '" class="deleteMenu ui-icon ui-icon-closethick"><span></span></span><span class="itemType" style="float:right;margin-right:30px;">Custom</span></span><div id="menuEdit' + id + '" class="menuEdit hidden"><input type="hidden" class="form-control" value="custom" name="type"/><div class="row" style="margin:10px 10px;"><label class="col-lg-12" style="margin-bottom:0px;font-size:12px;color:black;font-style:italic">Navigation Label</label><input type="text" class="form-control" value="' + htmlelement['title'] + '" name="title"></div><div class="row" style="margin:10px 10px;"><label class="col-lg-12" style="margin-bottom:0px;font-size:12px;color:black;font-style:italic">Navigation Url</label><input type="text" class="form-control" value="' + htmlelement['url'] + '" name="href"></div></div></div></li>';

			$('.sortable').append(html);
		}
	}
})

$(document).on('click','#save_menu',function(){
	var data = [];
	data = save_menu($('.sortable'),data);
	$.ajax({
		url:base_url + 'admin/menu/addmenu',
		type:'post',
		data:{data:data,usertype:$('#usertype').val()},
		success:function(res)
		{
			toastr['success']('You have successfully saved the menu','Success');
		}
	})
})

function save_menu(element,data)
{
	element.children().each(function(){
		var data_elem = {};
		$(this).children().each(function(){
			if($(this).hasClass('menuDiv'))
			{
				$(this).find('.form-control').each(function(){
					data_elem[$(this).attr('name')] = $(this).val();
				})
			}
			else if($(this)[0]['tagName'] == 'OL')
			{
				data_elem['children'] = [];
				data_elem['children'] = save_menu($(this),data_elem['children']);
			}
		})

		data.push(data_elem);
	})

	return data;
}

menu_init();
function menu_init()
{
	$('.sortable').html('');
	$.ajax({
		url:base_url + 'admin/menu/getmenu',
		type:'get',
		data:{usertype:$('#usertype').val()},
		success:function(res){
			res = JSON.parse(res);
			var html = '';
			html = display_menu_edit(res,html);
			$('.sortable').append(html);
		}
	})
}

function display_menu_edit(res,html)
{
	for(item in res)
	{
		if(res[item].type == 'page')
		{
			html += '<li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded" id="menuItem_' + index + '" data-foo="bar"><div class="menuDiv"><span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick"><span></span></span><span title="Click to show/hide item editor" data-id="' + index + '" class="expandEditor ui-icon ui-icon-triangle-1-n"><span></span></span><span><span data-id="' + index + '" class="itemTitle">' + res[item].title + '</span>';
			html += '<span title="Click to delete item." data-id="' + index + '" class="deleteMenu ui-icon ui-icon-closethick"><span></span></span><span class="itemType" style="float:right;margin-right:30px;">page</span></span><div id="menuEdit' + index + '" class="menuEdit hidden"><input type="hidden" class="form-control" value="' + res[item].href + '" name="href"/><input type="hidden" class="form-control" value="' + res[item].type + '" name="type"/><div class="row" style="margin:10px 10px;"><label class="col-lg-12" style="margin-bottom:0px;font-size:12px;color:black;font-style:italic">Navigation Label</label><input type="text" class="form-control" value="' + res[item].title + '" name="title"></div></div></div>';
		}
		else if(res[item].type == 'custom')
		{
			html += '<li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded" id="menuItem_' + index + '" data-foo="bar"><div class="menuDiv"><span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick"><span></span></span><span title="Click to show/hide item editor" data-id="' + index + '" class="expandEditor ui-icon ui-icon-triangle-1-n"><span></span></span><span><span data-id="' + index + '" class="itemTitle">' + res[item].title + '</span>';
			html += '<span title="Click to delete item." data-id="' + index + '" class="deleteMenu ui-icon ui-icon-closethick"><span></span></span><span class="itemType" style="float:right;margin-right:30px;">page</span></span><div id="menuEdit' + index + '" class="menuEdit hidden"><input type="hidden" class="form-control" value="' + res[item].type + '" name="type"/><div class="row" style="margin:10px 10px;"><label class="col-lg-12" style="margin-bottom:0px;font-size:12px;color:black;font-style:italic">Navigation Label</label><input type="text" class="form-control" value="' + res[item].title + '" name="title"></div><div class="row" style="margin:10px 10px;"><label class="col-lg-12" style="margin-bottom:0px;font-size:12px;color:black;font-style:italic">Navigation Url</label><input type="text" class="form-control" value="' + res[item].href + '" name="href"></div></div></div>';	
		}

		index++;
		if(res[item].children)
		{
			html += '<ol>';
			html = display_menu_edit(res[item].children,html);
			html += '</ol>';
		}
		html += '</li>';
	}

	return html;
}

$('#usertype').change(function(){
	menu_init();
})

$('#setting_form').submit(function(){
	var data = {};
	$('#setting_form').find('.form-control').each(function(){
		data[$(this).attr('name')] = $(this).val();
	});

	if($('#logo').val())
	{
		$.ajaxFileUpload({
			url:base_url + 'admin/menu/do_upload',
			secureuri:false,
			fileElementId:'profile',
			dataType: 'json',
			success:function(res)
			{

			}
		});
	}

	$.ajax({
		url:base_url + 'admin/menu/savesetting',
		type:'post',
		data:data,
		success:function(res)
		{
			window.location.reload();
		}
	})
	return false;
})