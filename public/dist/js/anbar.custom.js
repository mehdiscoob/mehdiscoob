var maxField = 10; //Input fields increment limitation
var wrapperSans = $('.wrapper.product'); //Input field wrapper
var ButtonsHtml = '<div class="form-row buttons"><div class="form-group col-md-2"><div class="field_wrapper"><a href="javascript:void(0);" class="add_button product btn btn-primary" title="Add field">اضافه کردن اقلام کالا</a></div></div><div class="form-group col-md-2"><div class="field_wrapper"><div class="input-group mb-2"><a href="javascript:void(0);" class="remove_button product btn btn-danger" title="Remove field">حذف محصول</a></div></div></div></div>';
var y = 0; //Initial field counter is 1
var values =[];

$(document).on('click', '.add_button.product', function (e) {
    e.preventDefault();
    if (y < maxField) {
        products = $(".form-row.product .product_list .products").map(function(){return $(this).attr('id')}).get(); /// list Of Prodct Ids
        $(document).on("change",".form-row.product .product_list",function() {
            $("option[value=" + this.value + "]", this)
                .attr("selected", true).siblings()
                .removeAttr("selected")
        });
        var id = $('.form-row.product .product_list .products:selected').attr('id');
        if(id !== undefined){
            products = $.grep(products, function(value) {
                return value != id;
            });
        }
        console.log(products);
        $('.form-row.product .product_list .products:selected').hide();
        productId = '#'+id;
        $(productId).remove();
        y++; //text box increment
        $(this).closest('.form-row').remove();
        $(wrapperSans).append('<div class="form-row mt-3 align-items-center product" id="product'+y+'"><div class="form-group col-md-4"><div class="field_wrapper"><div class="input-group mb-2"><div class="input-group-prepend"><div class="input-group-text product-text" >نام محصول</div></div><select name="product_id" class="form-control product_list" id="product_id"><option selected  value="0">انتخاب کنید</option><option  id="mahsule1" class="products" value="product1">product1</option><option  id="mahsule2" class="products" value="product2">product2</option></select></div></div></div><div class="form-group col-md-4"><div class="field_wrapper"><div class="input-group mb-2"><div class="input-group-prepend"><div class="input-group-text feli_mojodi_text" >موجودی فعلی</div></div><input type="text" name="tedad" class="form-control rounded disabled tedad" id="tedad"></div></div></div><div class="form-group col-md-4"><div class="field_wrapper"><div class="input-group mb-2"><div class="input-group-prepend"><div class="input-group-text">تعداد موردنظر</div></div><input type="number" id="tedad" name="tedad" min="1" max=""></div></div></div></div>');
        $(wrapperSans).append(ButtonsHtml); //Add field Add Button
        values = $(".form-row.product").map(function(){return $(this).attr('id')}).get();


        // if(y>1){
        //     $('.form-row.product .product_list').find('option').remove().end();
        //     console.log(products);
        //     $.each(products, function(index, value){
        //         $(".form-row.product .product_list").append("<option>"+value+"</option>");
        //     });
        // }

    }
});
//Once remove button is clicked
$(document).on('click', '.remove_button.product', function (e) {
    e.preventDefault();
    var itemLenghts = values.length;
    var deletedItem =values.pop(itemLenghts-1);
    var elementId = '#'+deletedItem;
    $(elementId).remove();
    if(itemLenghts == 1){
        $('.remove_button.product').remove();
    }
    --y; //Decrement field counter
});

///////// Get Seminar By Seminar_type Id

$('.seminar_type').change(function () {
    const id = this.value;
    const seminarInput = $('.seminar');
    if (isNaN(id)) {
        return false;
    }
    $.ajax({
        type: 'GET',
        url: "http://test.php/admin/seminar_type/"+id+"/seminar",
        timeout: 2000,
        beforeSend: function () {
            const preLoaderGif = '<img src="http://test.php/gif/ajax-loader.gif" width=20px class="seminar-preloader">';
            $('.seminar_text').html(preLoaderGif);
        },
        success: function (data) {
            if (data == null) {
                toastr.error('اطلاعات ادرس ها دریافت نشد')
            } else {
                $('.seminar_text').html('سمینارها');
                var seminar = "";
                data.forEach(function (value) {

                    seminar += "<option value=\"" + value.id + "\">" + value.title + "</option>";

                })
                seminarInput.html(seminar);
            }
        },
        error: function (xhr) {
            toastr.error('بروز خطا')
        }
    });
});
