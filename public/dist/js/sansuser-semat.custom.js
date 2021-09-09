///////// Get Sans By Seminar Id
$('.seminar').change(function () {
    const id = this.value;
    const sansInput = $('.sans');
    if (isNaN(id) || (id == 0)) {
        sansInput.html("<option value=\"0\" selected></option>");
        return;
    }
    $.ajax({
        type: 'GET',
        url: "http://test.php/admin/seminar/" + id + "/sans",
        timeout: 2000,
        beforeSend: function () {
            const preLoaderGif = '<div class="spinner-border spinner-border-sm" role="status"></div>';
            $('.sans-text').html(preLoaderGif);
        },
        success: function (data) {
            if (data == null) {
                toastr.error('اطلاعات ادرس ها دریافت نشد')
            } else {
                $('.sans-text').html('سانس');
                var sans = "<option value=\"0\" selected></option>";
                data.forEach(function (value) {
                    sans += "<option value=\"" + value.id + "\">" + value.order + "</option>";
                    sansInput.html(sans);
                })
            }
        },
        error: function (xhr) {
            toastr.error('بروز خطا')
        }
    });
});

// Fire Multi Select Box
let dualListbox = new DualListbox('.semat', {
    availableTitle: 'سمت های در دسترس',
    selectedTitle: 'سمت های انتخابی',
    addButtonText: 'افزودن',
    removeButtonText: 'حذف',
    addAllButtonText: 'افزودن همه',
    removeAllButtonText: 'حذف همه'
});

//Change multiselect search box text to persian
$('.dual-listbox__search').attr('placeholder', 'جستجو');
