
var currentpage = 1;
function pageinit()
{
	var preparepage = $(document).find('.page-card').length;
	var pages = parseInt(preparepage / 6);
	console.log(pages);
	if(pages * 6 < preparepage)
	{
		pages ++;	
	}

	console.log(pages);
	$('.aria-pagination').html('');
	if(pages>0)
	{
		$('.aria-pagination').html('<ul class="pagination" id="pagination" style="margin-left:20%;"></ul>');

		if(currentpage > pages)
		{
			currentpage = pages;
		}
		window.pagObj = $('#pagination').twbsPagination({
			startPage:currentpage,
	        totalPages: pages,
	        visiblePages: 10,
	        onPageClick: function (event, page) {
	        	currentpage = page;
	            $(document).find('.page-card').each(function(index){
	            	if(index >= 6*(page-1) && index<6*page)
	            	{
	            		$(this).show();
	            	}
	            	else
	            	{
	            		$(this).hide();
	            	}
	            })
	        }
	    }).on('page', function (event, page) {
	        console.info(page + ' (from event listening)');
	   });	
	}    
}
$('#summernote_1').summernote({
	height: 300,
	toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'codeview', 'help' ] ]
        ],
     popover: {
         image: [],
         link: [],
         air: []
       },
   disableResizeEditor: true
});

$('.section').find('.description').each(function(){
	$(this).summernote({
		height: 300,
		toolbar: [
	            [ 'style', [ 'style' ] ],
	            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
	            [ 'fontname', [ 'fontname' ] ],
	            [ 'fontsize', [ 'fontsize' ] ],
	            [ 'color', [ 'color' ] ],
	            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
	            [ 'table', [ 'table' ] ],
	            [ 'insert', [ 'link'] ],
	            [ 'view', [ 'undo', 'redo', 'codeview', 'help' ] ]
	        ],
	     popover: {
	         image: [],
	         link: [],
	         air: []
	       },
	   disableResizeEditor: true
	});
})

$('#savesection').click(function(){
	var title = $('input[name=sectiontitle]').val();
	if(!title)
	{
		toastr['error']('Please select your section title');
		return;
	}

	var length = $('.section').find('.section-description').length;

	console.log(length);
	html = '';
	// if(length % 2 == 0)
	// {
	// 	html = '<div class="row m-b-30">';
	// }

	var html = html +  '<div class="col-lg-6 section-description" style="margin-top:10px;"><div class="au-card au-card--no-shadow au-card--no-pad m-b-40"><div class="au-card-title" style="padding:20px 10px;"><div class="bg-overlay bg-overlay--blue"></div><h3 class="title">' + title + '</h3><span class="btn btn-danger delete_section" style="z-index:2;position:relative;float:right;bottom:30px;"><i class="fas fa-trash" style="margin-right:10px;"></i>Delete this section</span></div><div class="au-task"><div class="description" id="summernote-' + length + '" name="description"></div></div></div></div>';
	
	$('.section').append(html);
	
	$('#summernote-' + length).summernote({
		height: 300,
		toolbar: [
	            [ 'style', [ 'style' ] ],
	            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
	            [ 'fontname', [ 'fontname' ] ],
	            [ 'fontsize', [ 'fontsize' ] ],
	            [ 'color', [ 'color' ] ],
	            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
	            [ 'table', [ 'table' ] ],
	            [ 'insert', [ 'link'] ],
	            [ 'view', [ 'undo', 'redo', 'codeview', 'help' ] ]
	        ],
	  popover: {
         image: [],
         link: [],
         air: []
       },
	   disableResizeEditor: true
	});
})

$(document).on('click','.delete_section',function(){	
	$(this).parent().parent().parent().remove();
})

$(document).on('click','.save-blog',function(){
	var data = {};

	var enable = true;
	$('#maininfo').find('.bloginfo').each(function(){
		if($(this).attr('name'))
		{
			if(!$(this).val())
			{
				toastr['error']('Please add ' + $(this).attr('name'),'Error');
				enable = false;
				return;
			}
			data[$(this).attr('name')] = $(this).val();	
		}
		

	})
	
	data['description'] = $('#summernote_1').summernote('code');

	data['section'] = [];
	$('.section').find('.section-description').each(function(){
		var data_section = {};
		data_section.title = $(this).find('.title').eq(0).html();
		data_section.description = $(this).find('.description').eq(0).summernote('code');

		if(!data_section.description)
		{	
			toastr['error']('Please add the content about ' + data_section.title,'Error');
			enable = false;
		}
		data['section'].push(data_section);
	})

	if(!enable)
	{
		return;
	}

	if($(this).attr('attr_id'))
	{
		data['id'] = $(this).attr('attr_id');
	}

	if($('#logo').val())
	{
		$.ajaxFileUpload({
			url:base_url + 'admin/blog/do_upload',
			secureuri:false,
			fileElementId:'logo',
			dataType: 'json',
			success: function (res_file, status)
			{
				if(res_file.success)
				{
					data['logo'] = res_file.filename;
					$.ajax({
						url:base_url + 'admin/blog/addblog',
						type:'post',
						data:data,
						success:function(res){
							res = JSON.parse(res);
							if(res.success)
							{
								window.location.reload();
							}
						}
					})	
				}
				else{
					toastr['error'](res.message,'Error');
				}
				
			},
			error: function (data, status, e)
			{										
						
			}
		})
	}
	else if(data['id'])
	{
		$.ajax({
			url:base_url + 'admin/blog/addblog',
			type:'post',
			data:data,
			success:function(res){
				res = JSON.parse(res);
				if(res.success)
				{
					window.location.reload();
				}
			}
		})
	}
	else
	{
		toastr['error']('Please add Your Logo Image File','Error');
		return;
	}
})

pageinit();
$(document).on('click','.deleteblog',function(){
	var self = this;
	$.ajax({
		url:base_url + 'admin/blog/delete',
		type:'post',
		data:{id:$(this).attr('attr_id')},
		success:function(res){
			res = JSON.parse(res);
			if(res.success)
			{
				$(self).parent().parent().parent().remove();
				console.log(window.pagObj);
				pageinit();			
			}
		}
	})
})

$(document).on('click','.category',function(){
	var self = this;
	$.ajax({
		url:base_url + 'admin/blog/getbycategory',
		type:'post',
		data:{id:$(this).attr('attr_id')},
		success:function(res){
			res = JSON.parse(res);
			$('#category').find('.category').each(function(){
				$(this).removeClass('btn-primary');
				$(this).addClass('btn-outline-primary');
			})

			$(self).removeClass('btn-outline-primary');
			$(self).addClass('btn-primary');
			showdata(res);
		}
	})
})

function showdata(res)
{
	$('#blogs').html('');
	var html = '';
	for(item in res)
	{
		html += '<div class="col-md-4 page-card"><div class="card"><img class="card-img-top" src="' + base_url + res[item]['logo'] + '" alt="Card image cap" style="height:200px;"><div class="date" style="position:absolute;background-color: #ffffff;color:black; border-radius: 20px;">' + res[item]['created_date']+'</div><div class="card-body"><h4 class="card-title mb-3" style="max-width:90%;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">' + res[item]['title'] + '</h4><div class="card-text" style="height:200px;overflow-y: hidden;">' + res[item]['description'] + '</div></div><div class="cart-action row" style="padding:0px;margin:0px;"><span class="btn btn-danger col-md-6 deleteblog" attr_id="'+res[item]['id'] + '"><i class="fas fa-trash" style="margin-right:10px;"></i> Delete</span><a class="btn btn-primary col-md-6" href="' + base_url + 'admin/blog/newblog/' + res[item]['id'] + '"><i class="fas fa-edit" style="margin-right:10px;"></i> Edit</a></div></div></div>';
	}

	if(res.length == 0)
	{
		html = '<div class="col-md-12"><p> There is no blogs in this category</p></div>';
	}
	$('#blogs').html(html);
	currentpage = 1;
	pageinit();
}
