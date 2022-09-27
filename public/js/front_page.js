function latest_news_ajax_output() {
    $.ajax({
        type : 'get',
        url: '/latest-news-ajax-output',
        data:{},
        beforeSend: function() {
            $('#latest_news_div').html('<div class="text-center p-4"><img width="30%" class="loading_img_center" src="'+$('#loading_gif').val()+'" alt="topmobileinfo"></div>');
        },
        success:function(data){
           $('#latest_news_div').html(data);
        }
    });
}


function latest_compare_ajax_output() {
    $.ajax({
        type : 'get',
        url: '/latest-compare-ajax-output',
        data:{},
        beforeSend: function() {
            $('#latest_compare_output').html('<div class="text-center p-4"><img width="30%" class="loading_img_center" src="'+$('#loading_gif').val()+'" alt="topmobileinfo"></div>');
        },
        success:function(data){
           $('#latest_compare_output').html(data);
        }
    });
}

function product_faq(pid) {
    $.ajax({
        type : 'get',
        url: '/get_product_faq_ajax_output',
        data:{
            pid: pid,
        },
        beforeSend: function() {
            $('#product_faq_body').html('<div class="text-center p-4"><img width="30%" class="loading_img_center" src="'+$('#loading_gif').val()+'" alt="topmobileinfo"></div>');
        },
        success:function(data){
            $('#faq_status').val(1);
           $('#product_faq_body').html(data);
        }
    });
}

function similar_phones(pid) {
    $.ajax({
        type : 'get',
        url: '/similar_phone',
        data:{
            pid: pid,
        },
        beforeSend: function() {
            $('#similar_phone_body').html('<div class="text-center p-4"><img width="30%" class="loading_img_center" src="'+$('#loading_gif').val()+'" alt="topmobileinfo loading"></div>');
        },
        success:function(data){
           $('#similar_phone_body').html(data);
        }
    });
}

function similar_news(pid) {
    $.ajax({
        type : 'get',
        url: '/similar_news',
        data:{
            pid: pid,
        },
        beforeSend: function() {
            $('#similar_news_body').html('<div class="text-center p-4"><img width="30%" class="loading_img_center" src="'+$('#loading_gif').val()+'" alt="topmobileinfo loading"></div>');
        },
        success:function(data){
           $('#similar_news_body').html(data);
        }
    });
}

function blog_related_phones(blog_id) {
    $.ajax({
        type : 'get',
        url: '/blog_related_phones',
        data:{
            blog_id: blog_id,
        },
        beforeSend: function() {
            $('#blog_related_phone').html('<div class="text-center p-4"><img width="30%" class="loading_img_center" src="'+$('#loading_gif').val()+'" alt="topmobileinfo loading"></div>');
        },
        success:function(data){
           $('#blog_related_phone').html(data);
        }
    });
}


// compare

function cartload(){
    $.ajax({
        url: '/load_compare_data',
        method: "GET",
        beforeSend: function() {
            $('#comp_body').html('<div class="text-center p-4"><img width="50%" class="loading_img_center" src="'+$('#loading_gif').val()+'" alt="topmobileinfo loading"></div>');
        },
        success: function (response) {
            $('#comp_body').html(response);
        }
    });
}

function compmain(pid, status){
    if(status == true) { status = 1; } else { status = 0; }
    $.ajax({
        url: '/add_to_compare',
        method: "GET",
        data: {
            'pid': pid,
            'status': status,
        },
        beforeSend: function() {
            $('#comp_body').html('<div class="text-center p-4"><img width="50%" class="loading_img_center" src="'+$('#loading_gif').val()+'" alt="topmobileinfo loading"></div>');
        },
        success: function (response) {
            compcount();
            if(response.status == 1) {
                success("Added to compare.");
                $('#p'+pid).prop('checked', true);
                $('#ps'+pid).text("Added To Compare");
            }
            else if(response.status == 'ex') {
                error("Exist into compare!");
                $('#p'+pid).prop('checked', true);
                $('#ps'+pid).text("Added To Compare");
            }
            else if(response.status == 'de') {
                success("Deleted from compare.");
                $('#p'+pid).prop('checked', false);
                $('#ps'+pid).text("Add To Compare");
                cartload();
            }
            else if(response.status == 'ad') {
                error("Already Deleted!");
                $('#p'+pid).prop('checked', false);
                $('#ps'+pid).text("Add To Compare");
                cartload();
            }
            else if(response.status == 'ad') {
                error("Already Deleted!");
                $('#p'+pid).prop('checked', false);
                $('#ps'+pid).text("Add To Compare");
                cartload();
            }
            else if(response.status == 'ov') {
                error("Compare Limit End!");
                $('#p'+pid).prop('checked', false);
                $('#ps'+pid).text("Add To Compare");
                toggleCart();
            }
            
        }
    });
}

function compcount(){
    $.ajax({
        url: '/comp_item_number',
        method: "GET",
        success: function (response) {
            $('#compare_count').text(response);
        }
    });
}

function comp(pid) {
    var status = $('#p'+pid).is(':checked');
    $('#ps'+pid).text("Processing");
    compmain(pid, status);
}











