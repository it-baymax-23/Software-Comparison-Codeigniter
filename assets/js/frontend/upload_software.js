var count = 0;
var addedFilesHash = {};
var save = false;
var screenshot = [];
var uploaddata = {};

var myDropzone = new Dropzone("#my-dropzone", {
    paramName: "file", // The name that will be used to transfer the file
    addRemoveLinks: true,
    maxFilesize: 5, // MB
    parallelUploads: 5,
    uploadMultiple: true,
    acceptedFiles: "image/*",
    maxFiles: 10,
    init: function() {

        this.on("removedfile", function (file) {
            // delete from our dict removed file
            delete addedFilesHash[file];
        });
    },
    accept: function(file, done) {
        var _id = count++;
        file._id = _id;
        addedFilesHash[_id] = done;
    }
});


var nextstep = '';
function button_init_show()
{
	if(nextstep == '#home')
	{
		$('#prev').hide();
		$('#next').show();
		$('.savesoftware').hide();
	}
	else if(nextstep == '#settings')
	{
		$('.savesoftware').show();	
		$('#prev').show();
		$('#next').hide();
	}
	else
	{
		$('.savesoftware').hide();
		$('#next').show();	
	}
}

$('a[title]').click(function(){
	if($('#home').hasClass('active'))
	{
		if($(this).attr('href') != '#home')
		{
			nextstep = $(this).attr('href');
			$('#maininfo_submit').click();
			$('a[href="#home"]').addClass('done');
			return false;
		}
	}
	else
	{
		nextstep = $(this).attr('href');
		console.log($('div.show'));
		var activeid = $('div.show').attr('id');
		console.log(activeid);
		if($('#'+activeid).find('.submit_result').length > 0)
		{
			$('#'+activeid).find('.submit_result').eq(0).find('button[type="submit"]').eq(0).click();	
			return false;
		}

	}

	button_init_show();
	
})


function button_init()
{
	if($('#settings').hasClass('active'))
	{
		$('#next').hide();
		$('#prev').show();
		$('.savesoftware').show();
	}
	else if($('#home').hasClass('active'))
	{
		$('#next').show();
		$('.savesoftware').hide();
		$('#prev').hide();
	}
	else
	{
		$('#next').show();
		$('#prev').show();
		$('.savesoftware').hide();
	}
}


button_init();

$('#next').click(function(){
	button_init();
	if($('#home').hasClass('active'))
	{
		nextstep = '#screenshot';
		$('#maininfo_submit').click();
	}
	else
	{
		var element = true;
		$('a[title]').each(function(){
			if(!element)
			{
				$(this).click();
				element = true;
				return;
			}
			if($(this).hasClass('active show'))
			{
				console.log(element);
				element = false;
			}
		})
	}
})

function saveproduct()
{
	$('#main_info').find('.form-control').each(function(){
		uploaddata[$(this).attr('name')] = $(this).val();
	})

	uploaddata['screenshot'] = screenshot;
	uploaddata['videourl'] = $('input[name=video]').val();

	uploaddata['product_detail'] = {};

	$('#messages').find('.form-control').each(function(){
		if($(this).attr('name') != 'start_price')
		{
			uploaddata['product_detail'][$(this).attr('name')] = $(this).val();	
		}
		else
		{
			if(!uploaddata['product_detail']['start_price'] && $(this).val() && !isNaN($(this).val()))
			{
				uploaddata['product_detail']['start_price'] = $(this).val() + '$';	
			}
			else if(uploaddata['product_detail']['start_price'])
			{
				uploaddata['product_detail']['start_price'] += '/' + $(this).val();
			}
		}
	})

	uploaddata['product_detail']['training'] = {};
	$('#training').find('input[type=checkbox]').each(function(){
		uploaddata['product_detail']['training'][$(this).val()] = $(this)[0]['checked'];
	})

	uploaddata['product_detail']['support'] = {};
	$('#support').find('input[type=checkbox]').each(function(){
		uploaddata['product_detail']['support'][$(this).val()] = $(this)[0]['checked'];
	})

	uploaddata['feature'] = {};

	$('.featureEdit').find('.feature_select').each(function(){
		var data_category = {};
		console.log('aaa');
		$(this).find('input').each(function(){
			if($(this).attr('type') == 'checkbox')
			{
				data_category[$(this).attr('id')] = $(this)[0]['checked'];
			}
			else if($(this).attr('type') == 'text')
			{
				data_category[$(this).attr('name')] = $(this).val();
			}
		})

		console.log(data_category);
		uploaddata['feature'][$(this).attr('attr_id')] = data_category;
	})

	uploaddata['category'] = [];
	$('.categories').find('.category').each(function(){
		uploaddata['category'].push($(this).attr('attr_id'));
	})

	uploaddata['category'] = uploaddata['category'].join(',');
	
	if($('#logo').val())
	{
		$.ajaxFileUpload({
			url:base_url + 'admin/product/upload',
			secureuri:false,
			fileElementId:'logo',
			dataType: 'json',
			success:function(datajson, status){
				if(datajson.success)
				{
					uploaddata['logo'] = datajson.message;
					$.ajax({
						url:base_url + 'vendors/addproduct',
						type:'post',
						data:uploaddata,
						success:function(res){
							res = JSON.parse(res);
							if(res.success)
							{
								window.location.reload();
							}
						}
					})
				}
			}
		})
	}
}


myDropzone.on('success',function(data,data1){
	data1 = JSON.parse(data1);

	if(screenshot.length == 0)
	{
		screenshot = data1;
		console.log(screenshot);
		saveproduct();
	}
})

$('#prev').click(function(){
	var beforeelement;
	$('a[title]').each(function(){
		if($(this).hasClass('active show'))
		{
			beforeelement.click();
		}
		else
		{
			beforeelement = $(this);
		}
	})
})

$('.submit_result').submit(function(){
	if($(this).attr('id') == 'main_info')
	{
		if($('.categories').find('.category').length == 0)
		{
			toastr['error']('You must select at least one category','Error');
			return false;
		}

		if(!save)
		{
			$('#home').removeClass('active show');
			$('a[href="#home"]').removeClass('active show');
			console.log(nextstep);
			$(nextstep).addClass('active show');
			$('a[href="' + nextstep + '"]').addClass('active show');
			button_init();	
		}
		else
		{
			for(item in addedFilesHash)
			{
				var done = addedFilesHash[item];
				done();
			}

			if(addedFilesHash.length == 0)
			{
				saveproduct();
			}

			return false;
		}	
	}
	else
	{
		if(!save)
		{

			$(this).parents('.tab-pane').removeClass('active show');
			var id = $(this).parents('.tab-pane').attr('id');
			$('a[href="#' + id + '"]').removeClass('active show');
			$(nextstep).addClass('active show');
			$('a[href="' + nextstep + '"]').addClass('active show');
			button_init();	
			button_init_show();
		}	
	}
	return false;
})

$(document).on('click','.deletecategory',function(){
	var data = $('#sample_1').DataTable().rows().nodes();
	var id = $(this).parent().attr('attr_id');
	$('.featureEdit').find('.feature_select[attr_id=' + id + ']').eq(0).remove();
	$(this).parent().remove();
	$.each(data,function(){
		console.log($(this).find('input').val());
		console.log($(self).parent().attr('attr_id'));
		if($(this).find('input').val() == id)
		{
			$(this).find('input')[0]['checked'] = false;
		}
	})
})

$(document).on('click','.category_select',function(){
	if($(this)[0]['checked'])
	{
		var id = $(this).val();
		var name = $(this).parent().parent().parent().find('td').eq(1).html();
		$('.categories').append('<span class="badge badge-dark category" style="margin:2px;" attr_id="' + id + '">' + name + '<i class="fa fa-times-circle deletecategory" style="margin-left:5px;"></i></span>');

		$.ajax({
			url:base_url + 'admin/product/getfeatures',
			data:{id:id},
			type:'post',
			success:function(res){

				res = JSON.parse(res);
				var html = '<form class="form-horizontal"><div class="form-body">';
				$.each(res,function(key,value){
					
					if(value.type == 'checkbox')
					{
						html += '<div class="form-group row" style="margin-left:20px;"><div class="checkbox checkbox-success"><input id="' + value.id + '" class="styled" type="checkbox"/><label for="' + value.id + '" style="margin-left:10px;">' + value.name + '</label></div></div>';
					}
					else
					{
						html += '<div class="form-group row" style="margin-left:20px;"><label class="col col-md-4">' + value.name + '</label><div class="col col-md-8"><input type="text" class="form-control" name="' + value.id + '" style="margin-left:10px;"/></div></div>';
					}

					
				})

				html += '</div></div></form>';
				$('.featureEdit').append('<div class="card feature_select col-lg-5" attr_id="' + id + '" style="padding:0px;margin:20px;"><div class="card-header"><span class="title-3 m-l-30"><i class="fa fa-gift"></i>' + name + ' Features</span></div><div class="card-body form">' + html + '</div></div>');
			}
		})
		
	}
	else
	{
		$('.categories').find('span[attr_id=' + $(this).val() + ']').eq(0).remove();
		$('.featureEdit').find('.feature_select[attr_id=' + $(this).val() + ']').eq(0).remove();
	}
})

$('.savesoftware').click(function(){
	save = true;
	$('#maininfo_submit').click();
})