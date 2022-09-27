
$('#url').keyup(function () {
    check_exist_url();
});

function check_exist_url() {
    $('#url_check_output').html('');
    var status = $('#status').val();
    var url = $('#url').val();
    if(url != '') {
        $.ajax({
            url: "/admin/check-product-url",
            type: "get",
            data: {
                url:url,
                status:status,
            },
            beforeSend: function(xhr) {
                $('#processing_id').html('<div style="padding: 10px; color: #0CC510;">Checking url...<div>');
            },
            success: function(data) {
                if(data['status'] == 'yes') {
                    $('#url_check_output').html('<span class="bg-danger p-1 text-light">This Product/url Is Exist as '+data['title']+'</span>');
                }
                else if(data['status'] == 'no'){
                    $('#url_check_output').html('<span class="text-success"><i class="fas fa-check"></i></span>');
                }
                $('#processing_id').html('');
            },
        });
    }
}


function add_new_price() {
    const d = new Date();
    var update_row_count = d.getTime();
    $('#price_table tr:last').after('<tr id="price_tr_'+update_row_count+'"><td class="font-w600 text-danger font-size-sm" width="45%"><input type="hidden" value="0" name="old_id[]" ><input type="text" required class="form-control border-dark" placeholder="Variation, ex: 4/64 GB"  name="variant[]"></td><td class="font-w600 text-danger font-size-sm" width="25%"><input type="number" step="any" required class="form-control border-dark" placeholder="Price, ex: 10000"  name="price[]"></td><td class="font-w600 text-danger font-size-sm" width="25%"><input type="number" step="any"  class="form-control border-dark" placeholder="Discount Price, ex: 9000" name="discount_price[]"></td><td class="font-w600 text-danger font-size-sm" width="5%"><button type="button" onclick="delete_price('+update_row_count+')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></td></tr>');
}

function delete_price(row_number) {
    if(row_number > 1) {
        $('#price_tr_'+row_number).remove();
    }
}

function delete_price_form_database(row_num, id) {
    if(row_num != 0) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: "/admin/delete-product-price",
                type: "get",
                data: {
                    id:id,
                },
                beforeSend: function(xhr) {
                    $('#processing_id').html('<div style="padding: 10px; text-align: center;">Processing...<div>');
                },
                success: function(data) {
                    if(data['status'] == 'yes') {
                        $('#price_tr_'+row_num).remove();
                    }
                    else {
                        alert('erroe occoured! Plese try again.')
                    }
                    $('#processing_id').html('');
                },
            });
            }
        });
    }
}



function add_new_gallery() {
    const d = new Date();
    var update_row_count = d.getTime();
    $('#gallery_table tr:last').after('<tr id="gallery_tr_'+update_row_count+'"><td class="font-w600 text-danger font-size-sm" width="45%"><input type="hidden" name="gallery_old_id[]" value="0" ><input type="file" required class="form-control form-control-sm border-dark"  name="gallery_image[]"></td><td class="font-w600 text-danger font-size-sm" width="25%"><input type="number" required class="form-control form-control-sm" placeholder="Serial(Ex. 1)"  name="image_serial[]"></td><td class="font-w600 text-danger font-size-sm" width="5%"><button type="button" onclick="delete_gallery_image('+update_row_count+')" class="btn btn-danger btn-rounded btn-sm"><i class="fas fa-trash-alt"></i></button></td>');
}

function delete_gallery_image(row_number) {
    if(row_number > 1) {
        $('#gallery_tr_'+row_number).remove();
    }
}



function delete_gallery_form_database(row_num, id) {
    if(row_num != 0) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: "/admin/delete-product-gallery",
                type: "get",
                data: {
                    id:id,
                },
                beforeSend: function(xhr) {
                    $('#processing_id').html('<div style="padding: 10px; text-align: center;">Processing...<div>');
                },
                success: function(data) {
                    if(data['status'] == 'yes') {
                        $('#gallery_tr_'+row_num).remove();
                    }
                    else {
                        alert('erroe occoured! Plese try again.')
                    }
                    $('#processing_id').html('');
                },
            });
            }
        });
    }
}


function add_new_tag(tag_input) {
    if(tag_input == null) {
        var tag_input = $('#tag_input').val();
    }
    var updated_tag = tag_input.replaceAll(" ", "-");
    if(tag_input != '' && $('#'+updated_tag).val() == null) {
        const d = new Date();
        var update_row_count = d.getTime();
        $('#tags_table tr:last').after('<tr id="tags_tr_'+update_row_count+'"><td class="font-w600 font-size-sm"><input type="hidden" name="tag_old_id[]" value="0"><input type="hidden" id="'+updated_tag+'" value="'+tag_input+'" name="tag[]">'+tag_input+' <button type="button" onclick="delete_tag('+update_row_count+')" class="text-danger"><i class="fas fa-trash-alt text-danger"></i></button></td></tr>');
        $('#tag_input').val('');
    }
    else {
        error('This Tag is exist!');
    }
}

function delete_tag(row_number) {
    if(row_number > 1) {
        $('#tags_tr_'+row_number).remove();
    }
    
}

function most_popular_product_tag() {
    $.ajax({
        url: "/admin/get-most-popular-product-tag",
        type: "get",
        data: {},
        beforeSend: function(xhr) {
            $('#popular_tags_body').html('<div style="padding: 10px; color: #0CC510;">Loading...<div>');
        },
        success: function(data) {
            $('#popular_tags_body').html(data);
        },
    });
}