import './bootstrap';
import '../fontawesome-pro/js/all.js'

import $ from 'jquery';

$();
import select2 from 'select2';

select2();
$(document).ready(function () {
    $('.js-example-basic-single').select2({
        placeholder: "ببین چی شد...",
        dir: 'rtl',
        //اینکه بتونه خودش هم فیلد اضافه کنه
        tags: true,
        //اگه BackSpace رو بزنه کل سلکت ها حذف میشن
        allowClear: true

    });
    $('div.alert').delay(3000).slideUp(300);
});
