// Fire Multiselect box
let dualListbox = new DualListbox('.roles', {
    availableTitle: 'نقش های در دسترس',
    selectedTitle: 'نقش های انتخابی',
    addButtonText: 'افزودن',
    removeButtonText: 'حذف',
    addAllButtonText: 'افزودن همه',
    removeAllButtonText: 'حذف همه'
});
// Change Multiselect Search box To Persian
$('.dual-listbox__search').attr('placeholder', 'جستجو');
