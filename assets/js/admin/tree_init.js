if($('#tree_2').length > 0)
{
	$('#tree_2').jstree({
        'plugins': ["wholerow", "checkbox", "types"],
        'core': {
            "themes" : {
                "responsive": false
            }
        },
        "types" : {
            "default" : {
                "icon" : "fa fa-folder icon-state-warning icon-lg"
            },
            "file" : {
                "icon" : "fa fa-file icon-state-warning icon-lg"
            }
        }
    });
}