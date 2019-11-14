var data = null;
$.curCSS = function(element, prop, val) {
    return jQuery(element).css(prop, val);
};

 $.widget("custom.catcomplete", $.ui.autocomplete, {
     _renderMenu: function (ul, items) {
        console.log(items);
        console.log(ul);
         var self = this,
        currentCategory = "";
        for(key in items)
        {
            $.each(items[key], function (index, item) { 
                if(!item.category_search)
                {
                    return;
                }
                 if (item.category_search != currentCategory) {
                     ul.append("<li class='category_item'><h3>" + item.category_search + "</h3></li>");
                     currentCategory = item.category_search;
                 }
                 self._renderItem(ul, item);
             });   
        }
         
     },

     _renderItem:function(ul,item){
        if(item.category_search == 'category')
        {
            ul.append('<li class="subitem_search"><a href = "' + base_url + 'category/' + item.id + '">' + item.name + '</a></li>');
        }   
        else if(item.category_search == 'product')
        {
            ul.append('<li class="subitem_search"><a href="' + base_url +'productdetail/' + item.id + '"><div class="product_logo" style="width:50px;height:50px;float:left;"><div class="productlink"><img src="' + base_url + item.logo + '"></div></div><span style="float:left;margin-top:20px;">' + item.name + '</span></a></li>');
        }
        else if(item.category_search == 'resource')
        {
            ul.append('<li class="subitem_search"><a href="' + base_url + 'blogs/' + item.id + '"><div class="product_logo" style="width:50px;height:50px;float:left;"><div class="productlink"><img src="' + base_url + item.logo + '" style="width:50px;height:50px;margin-right:20px;"></div></div><span style="float:left;margin-top:20px;">' + item.title + '</span></a></li>');
        }
     }
 });

 jQuery.support.cors = true;


 $(document).ready(function () {
     $(".header_search_input").catcomplete({
         delay: 1000,
         source: function (request, response) {
             $.ajax({
                 url: base_url + 'search?search=' + request.term,
                 dataType: "json",
                 data:{type:'post'},
                 type: "POST",
                 dataFilter: function (data) { return data; },
                 success: function (data) {
                     return response(data);
                 },
                 error: function (result) {
                     alert("Error" + result.statusText);
                 }
             });
         }
     });
 });