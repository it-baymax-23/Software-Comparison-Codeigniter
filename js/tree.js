$.fn.extend({
	    treed: function (o) {
	      
	      var openedClass = 'fa-minus';
	      var closedClass = 'fa-plus';
		  
	      if (typeof o != 'undefined'){
	        if (typeof o.openedClass != 'undefined'){
	        openedClass = o.openedClass;
	        }
	        if (typeof o.closedClass != 'undefined'){
	        closedClass = o.closedClass;
	        }
	      };
	      
	        //initialize each of the top levels
	        var tree = $(this);
	        tree.addClass("tree");
	        tree.find('li').has("ul").each(function () {
	            var branch = $(this); //li with children ul
	            branch.prepend("<div class='col-3 col-lg-1 col-md-2 col-sm-2 col-xs-3 icon'><i class='fas " + closedClass + "' style='cursor:pointer'></i></div>");
	            branch.addClass('branch row');
	            branch.find('.icon').eq(0).on('click', function (e) {
                    var icon = $(this).find('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).parent().find('.sub').toggle();	               
	            })
	            branch.find('.sub').toggle();
	        });
	        //fire event from the dynamically added icon
	      tree.find('.branch .fas').each(function(){
	        $(this).on('click', function () {
	            $(this).closest('li').click();
	        });
	      });
	        //fire event to open branch if the li contains an anchor instead of text
	        tree.find('.branch>a').each(function () {
	            $(this).on('click', function (e) {
	                $(this).closest('li').click();
	                e.preventDefault();
	            });
	        });
	        //fire event to open branch if the li contains a button instead of text
	        tree.find('.branch>button').each(function () {
	            $(this).on('click', function (e) {
	                $(this).closest('li').click();
	                e.preventDefault();
	            });
	        });
	    }
	});

	//Initialization of treeviews

	$('#tree1').treed();

	$('#tree2').treed({openedClass:'glyphicon-folder-open', closedClass:'glyphicon-folder-close'});

	$('#tree3').treed({openedClass:'glyphicon-chevron-right', closedClass:'glyphicon-chevron-down'});