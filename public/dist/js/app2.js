(function ($) {

    "use strict";
    var primarycolor = getComputedStyle(document.body).getPropertyValue('--primarycolor');

//////////////////////// Window On Load //////////////////
    $(window).on("load", function () {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
        ;
    });

/////////////////////// Loader /////////////////////
    var angle = 0;
    setInterval(function () {

        $(".se-pre-con img")
            .css('-webkit-transform', 'rotate(' + angle + 'deg)')
            .css('-moz-transform', 'rotate(' + angle + 'deg)')
            .css('-ms-transform', 'rotate(' + angle + 'deg)');
        angle++;
        angle++;
        angle++;
    }, 10);


    if ($(window).width() < 992) {
        $('body #side-menu').slimScroll({
            height: '640px',
            color: '#fff'
        });
    } else {
        $('body:not(.horizontal-menu) #side-menu').slimScroll({
            height: '640px',
            color: '#fff'
        });
    }

    $('.scrollerchat').slimScroll({
        height: '440px',
        color: '#fff'
    });
    $('.popupchat').slimScroll({
        height: '220px',
        color: '#fff'
    });
    $('.scrollertodo').slimScroll({
        height: '660px',
        color: '#fff'
    });

    $('[data-toggle="tooltip"]').tooltip();
    // $('[data-toggle="popover"]').popover();

    $('.checkall').on('click', function () {
        $('.mail-app input:checkbox').not(this).prop('checked', this.checked);
    });
    /**********************Fix Menu**************************/
    var secondaryNavTopPosition = $('#header-fix').offset().top;
    var outerHeight = $('#header-fix').outerHeight();
    $(window).scroll(function () {
        // find the id with class 'active' and remove it


        // get the amount the window has scrolled
        var scroll = $(window).scrollTop();
        // add the 'active' class to the correct id based on the scroll amount

        if (scroll > secondaryNavTopPosition) {
            $("#header-fix").addClass("is-fixed");
            $('.sub-header').css({
                position: 'fixed',
                overflow: 'hidden',
                top: outerHeight + 'px',
                marginTop: '0px!important',
                width: '100%',
                left: '0',
                right: '0',
                zIndex: 8,
                backgroundColor: '#dad6ff',
                margin: '0 1rem!important'
            })
            $('.card').css({marginTop: '55px'})
        } else {
            $("#header-fix").removeClass("is-fixed");
            $('.sub-header').css({
                position: 'relative',
                top: 'auto',
                zIndex: 1,
                backgroundColor: 'var(--mainbackground)'
            })

        }
    });
    $(window).scroll(function () {
        // find the id with class 'active' and remove it


        // get the amount the window has scrolled
        var scroll = $(window).scrollTop();
        // add the 'active' class to the correct id based on the scroll amount
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });
    /********************************** Top Scroll *************************/
    $('.scrollup').on('click', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    /****************************** Window Scroll ****************************/



    ///////////////////////Toaster////////////////
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "600",
        "hideDuration": "600",
        "timeOut": "1000",
        "extendedTimeOut": "2000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    // $(".success").click(function () {
    //     toastr.success('عمل ثبت با موفقیت انجام شد')
    // });
    // $(".warning").click(function () {
    //     toastr.warning('ثبت اطلاعات شما لغو شد')
    // });

//////////////////////// Country Drop Down /////////////////
    $('#options').flagStrap({
        countries: {
            "AF": "Afghanistan",
            "AL": "Albania",
            "DZ": "Algeria",
            "AS": "American Samoa",
            "AD": "Andorra",
            "AO": "Angola",
            "AI": "Anguilla",
            "AG": "Antigua and Barbuda",
            "AR": "Argentina",
            "AM": "Armenia",
            "AW": "Aruba",
            "AU": "Australia",
            "AT": "Austria",
            "AZ": "Azerbaijan",
            "BS": "Bahamas",
            "BH": "Bahrain",
            "BD": "Bangladesh",
            "BB": "Barbados",
            "BY": "Belarus",
            "BE": "Belgium",
            "BZ": "Belize",
            "BJ": "Benin",
            "BM": "Bermuda",
            "BT": "Bhutan",
            "BO": "Bolivia, Plurinational State of",
            "BA": "Bosnia and Herzegovina",
            "BW": "Botswana",
            "BV": "Bouvet Island",
            "BR": "Brazil",
            "IO": "British Indian Ocean Territory",
            "BN": "Brunei Darussalam",
            "BG": "Bulgaria",
            "BF": "Burkina Faso",
            "BI": "Burundi",
            "KH": "Cambodia",
            "CM": "Cameroon",
            "CA": "Canada",
            "CV": "Cape Verde",
            "KY": "Cayman Islands",
            "CF": "Central African Republic",
            "TD": "Chad",
            "CL": "Chile",
            "CN": "China",
            "CO": "Colombia",
            "KM": "Comoros",
            "CG": "Congo",
            "CD": "Congo, the Democratic Republic of the",
            "CK": "Cook Islands",
            "CR": "Costa Rica",
            "CI": "C" + "&ocirc;" + "te d'Ivoire",
            "HR": "Croatia",
            "CU": "Cuba",
            "CW": "Cura" + "&ccedil;" + "ao",
            "CY": "Cyprus",
            "CZ": "Czech Republic",
            "DK": "Denmark",
            "DJ": "Djibouti",
            "DM": "Dominica",
            "DO": "Dominican Republic",
            "EC": "Ecuador",
            "EG": "Egypt",
            "SV": "El Salvador",
            "GQ": "Equatorial Guinea",
            "ER": "Eritrea",
            "EE": "Estonia",
            "ET": "Ethiopia",
            "FK": "Falkland Islands (Malvinas)",
            "FO": "Faroe Islands",
            "FJ": "Fiji",
            "FI": "Finland",
            "FR": "France",
            "GF": "French Guiana",
            "PF": "French Polynesia",
            "TF": "French Southern Territories",
            "GA": "Gabon",
            "GM": "Gambia",
            "GE": "Georgia",
            "DE": "Germany",
            "GH": "Ghana",
            "GI": "Gibraltar",
            "GR": "Greece",
            "GL": "Greenland",
            "GD": "Grenada",
            "GP": "Guadeloupe",
            "GU": "Guam",
            "GT": "Guatemala",
            "GG": "Guernsey",
            "GN": "Guinea",
            "GW": "Guinea-Bissau",
            "GY": "Guyana",
            "HT": "Haiti",
            "HM": "Heard Island and McDonald Islands",
            "VA": "Holy See (Vatican City State)",
            "HN": "Honduras",
            "HK": "Hong Kong",
            "HU": "Hungary",
            "IS": "Iceland",
            "IN": "India",
            "ID": "Indonesia",
            "IR": "Iran, Islamic Republic of",
            "IQ": "Iraq",
            "IE": "Ireland",
            "IM": "Isle of Man",
            "IL": "Israel",
            "IT": "Italy",
            "JM": "Jamaica",
            "JP": "Japan",
            "JE": "Jersey",
            "JO": "Jordan",
            "KZ": "Kazakhstan",
            "KE": "Kenya",
            "KI": "Kiribati",
            "KP": "Korea, Democratic People's Republic of",
            "KR": "Korea, Republic of",
            "KW": "Kuwait",
            "KG": "Kyrgyzstan",
            "LA": "Lao People's Democratic Republic",
            "LV": "Latvia",
            "LB": "Lebanon",
            "LS": "Lesotho",
            "LR": "Liberia",
            "LY": "Libya",
            "LI": "Liechtenstein",
            "LT": "Lithuania",
            "LU": "Luxembourg",
            "MO": "Macao",
            "MK": "Macedonia, the former Yugoslav Republic of",
            "MG": "Madagascar",
            "MW": "Malawi",
            "MY": "Malaysia",
            "MV": "Maldives",
            "ML": "Mali",
            "MT": "Malta",
            "MH": "Marshall Islands",
            "MQ": "Martinique",
            "MR": "Mauritania",
            "MU": "Mauritius",
            "YT": "Mayotte",
            "MX": "Mexico",
            "FM": "Micronesia, Federated States of",
            "MD": "Moldova, Republic of",
            "MC": "Monaco",
            "MN": "Mongolia",
            "ME": "Montenegro",
            "MS": "Montserrat",
            "MA": "Morocco",
            "MZ": "Mozambique",
            "MM": "Myanmar",
            "NA": "Namibia",
            "NR": "Nauru",
            "NP": "Nepal",
            "NL": "Netherlands",
            "NC": "New Caledonia",
            "NZ": "New Zealand",
            "NI": "Nicaragua",
            "NE": "Niger",
            "NG": "Nigeria",
            "NU": "Niue",
            "NF": "Norfolk Island",
            "MP": "Northern Mariana Islands",
            "NO": "Norway",
            "OM": "Oman",
            "PK": "Pakistan",
            "PW": "Palau",
            "PS": "Palestinian Territory, Occupied",
            "PA": "Panama",
            "PG": "Papua New Guinea",
            "PY": "Paraguay",
            "PE": "Peru",
            "PH": "Philippines",
            "PN": "Pitcairn",
            "PL": "Poland",
            "PT": "Portugal",
            "PR": "Puerto Rico",
            "QA": "Qatar",
            "RE": "R" + "&eacute;" + "union",
            "RO": "Romania",
            "RU": "Russian Federation",
            "RW": "Rwanda",
            "SH": "Saint Helena, Ascension and Tristan da Cunha",
            "KN": "Saint Kitts and Nevis",
            "LC": "Saint Lucia",
            "MF": "Saint Martin (French part)",
            "PM": "Saint Pierre and Miquelon",
            "VC": "Saint Vincent and the Grenadines",
            "WS": "Samoa",
            "SM": "San Marino",
            "ST": "Sao Tome and Principe",
            "SA": "Saudi Arabia",
            "SN": "Senegal",
            "RS": "Serbia",
            "SC": "Seychelles",
            "SL": "Sierra Leone",
            "SG": "Singapore",
            "SX": "Sint Maarten (Dutch part)",
            "SK": "Slovakia",
            "SI": "Slovenia",
            "SB": "Solomon Islands",
            "SO": "Somalia",
            "ZA": "South Africa",
            "GS": "South Georgia and the South Sandwich Islands",
            "SS": "South Sudan",
            "ES": "Spain",
            "LK": "Sri Lanka",
            "SD": "Sudan",
            "SR": "Suriname",
            "SZ": "Swaziland",
            "SE": "Sweden",
            "CH": "Switzerland",
            "SY": "Syrian Arab Republic",
            "TW": "Taiwan, Province of China",
            "TJ": "Tajikistan",
            "TZ": "Tanzania, United Republic of",
            "TH": "Thailand",
            "TL": "Timor-Leste",
            "TG": "Togo",
            "TK": "Tokelau",
            "TO": "Tonga",
            "TT": "Trinidad and Tobago",
            "TN": "Tunisia",
            "TR": "Turkey",
            "TM": "Turkmenistan",
            "TC": "Turks and Caicos Islands",
            "TV": "Tuvalu",
            "UG": "Uganda",
            "UA": "Ukraine",
            "AE": "United Arab Emirates",
            "GB": "United Kingdom",
            "US": "United States",
            "UM": "United States Minor Outlying Islands",
            "UY": "Uruguay",
            "UZ": "Uzbekistan",
            "VU": "Vanuatu",
            "VE": "Venezuela, Bolivarian Republic of",
            "VN": "Viet Nam",
            "VG": "Virgin Islands, British",
            "VI": "Virgin Islands, U.S.",
            "WF": "Wallis and Futuna",
            "EH": "Western Sahara",
            "YE": "Yemen",
            "ZM": "Zambia",
            "ZW": "Zimbabwe"
        },
        buttonSize: "btn-sm",
        buttonType: "btn-primary",
        labelMargin: "10px",
        scrollable: true,
        scrollableHeight: "350px"
    });

    /**************** Chat Pop Up **********************/
    $('.chatbutton').on('click', function () {
        $('.chatwindow').toggle();
        return false;

    });

    //////////////////////// Window On Resize //////////////////
    $(window).on("resize", function () {
        if ($(window).width() < 992) {
            $('body #side-menu').slimScroll({
                height: '640px',
                color: '#fff'
            });
        } else {
            $(".horizontal-menu .sidebar .slimScrollBar,.horizontal-menu .sidebar .slimScrollRail").remove();
            $(".horizontal-menu .sidebar .slimScrollDiv").contents().unwrap();
            $('.horizontal-menu #side-menu').attr('style', '');
            $('.horizontal-menu #side-menu ul').attr('style', '');
        }
    });

    /*==============================================================
     Sidebar
     ============================================================= */

    $('.sidebarCollapse').on('click', function () {
        $('body').toggleClass('hide-sidebar');
        $('.sidebar').toggleClass('active');
        $('#header-fix').toggleClass('active');
    });

    $('.mobilesearch').on('click', function () {
        $('.search-form').toggleClass('d-none');

    });

    /////////////////////////// Persian Date Picker////////////////
    $(".persian_datepicker").persianDatepicker({
        months: ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
        dowTitle: ["شنبه", "یکشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنج شنبه", "جمعه"],
        shortDowTitle: ["ش", "ی", "د", "س", "چ", "پ", "ج"],
        showGregorianDate: !1,
        persianNumbers: !0,
        format: 'YY/MM/DD',

        selectedBefore: !1,
        selectedDate: null,
        startDate: null,
        endDate: null,
        prevArrow: '\u25c4',
        nextArrow: '\u25ba',
        theme: 'default',
        alwaysShow: !1,
        selectableYears: null,
        selectableMonths: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
        cellWidth: 25, // by px
        cellHeight: 20, // by px
        fontSize: 13, // by px
        isRTL: !1,
        onShow: function () {
        },
        onHide: function () {
        },
        onSelect: function () {
        },
        onRender: function () {
        }
    });

    ////////////////////////Add Field Dynamically///////////////
    var maxField = 10; //Input fields increment limitation
    var addButtonSans = $('.add_button.sans'); //Add button selector
    var wrapperSans = $('.wrapper.sans'); //Input field wrapper
    var fieldHTMLSans = '<div class="form-row mt-3 align-items-center">\n' +
        '                                                    <div class="form-group col-md-4">\n' +
        '                                                        <div class="field_wrapper">\n' +
        '                                                            <div class="input-group mb-2">\n' +
        '                                                                <div class="input-group-prepend">\n' +
        '                                                                    <div class="input-group-text">سانس</div>\n' +
        '                                                                </div>\n' +
        '                                                                <select id="inputState" class="form-control">\n' +
        '                                                                    <option selected>انتخاب</option>\n' +
        '                                                                    <option>...</option>\n' +
        '                                                                </select>                                                            </div>\n' +
        '                                                        </div>\n' +
        '                                                    </div>\n' +
        '                                                    <div class="form-group col-md-3">\n' +
        '                                                        <div class="field_wrapper">\n' +
        '                                                            <div class="input-group mb-2">\n' +
        '                                                                <div class="input-group-prepend">\n' +
        '                                                                    <div class="input-group-text">شروع سانس</div>\n' +
        '                                                                </div>\n' +
        '                                                                <input type="time" class="form-control"  name="field_name_time[]" value=""/>\n' +
        '\n' +
        '                                                            </div>\n' +
        '                                                        </div>\n' +
        '                                                    </div>\n' +
        '                                                    <div class="form-group col-md-3">\n' +
        '                                                        <div class="field_wrapper">\n' +
        '                                                            <div class="input-group mb-2">\n' +
        '                                                                <div class="input-group-prepend">\n' +
        '                                                                    <div class="input-group-text">پایان سانس</div>\n' +
        '                                                                </div>\n' +
        '                                                                <input type="time" class="form-control"  name="field_name_time[]" value=""/>\n' +
        '\n' +
        '                                                            </div>\n' +
        '                                                        </div>\n' +
        '                                                    </div>\n' +
        '                                                    <div class="form-group col-md-2">\n' +
        '                                                        <div class="field_wrapper">\n' +
        '                                                            <a href="javascript:void(0);" class="remove_button mr-3" title="Add field"><i class="icon-minus"></i></a>\n' +
        '                                                        </div>\n' +
        '                                                    </div>\n' +
        '                                                </div>'; //New input field html
    var x = 1; //Initial field counter is 1


    //Once add button is clicked
    $(addButtonSans).click(function () {
        //Check maximum number of input fields
        if (x < maxField) {
            x++; //Increment field counter
            $(wrapperSans).append(fieldHTMLSans); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapperSans).on('click', '.remove_button', function (e) {
        e.preventDefault();
        $(this).closest('.form-row').remove(); //Remove field html
        x--; //Decrement field counter
    });

    /////////////////////////Add Dynamically Mojody Anbar///////////////
    var maxField = 10; //Input fields increment limitation
    var addButtonMojodi = $('.anbar_mojodi.add_button'); //Add button selector
    var wrapperMojodi = $('.anbar_mojodi.wrapper'); //Input field wrapper
    var fieldHTMLMojodi = '                                                <div class="form-row align-items-center">\n' +
        '                                                    <div class="form-group col-md-5">\n' +
        '                                                        <div class="field_wrapper">\n' +
        '                                                            <div class="input-group mb-2">\n' +
        '                                                                <div class="input-group-prepend">\n' +
        '                                                                    <div class="input-group-text">نام محصول</div>\n' +
        '                                                                </div>\n' +
        '                                                                <input type="text" class="form-control rounded" id="inputname">                                                            </div>\n' +
        '                                                        </div>\n' +
        '                                                    </div>\n' +
        '                                                    <div class="form-group col-md-5">\n' +
        '                                                        <div class="field_wrapper">\n' +
        '                                                            <div class="input-group mb-2">\n' +
        '                                                                <div class="input-group-prepend">\n' +
        '                                                                    <div class="input-group-text">موجودی</div>\n' +
        '                                                                </div>\n' +
        '                                                                <input type="number" class="form-control rounded" id="quantity" name="quantity">\n' +
        '                                                            </div>\n' +
        '                                                        </div>\n' +
        '                                                    </div>\n' +
        '                                                    <div class="form-group col-md-2">\n' +
        '                                                        <div class="field_wrapper">\n' +
        '                                                            <a href="javascript:void(0);" class=" anbar_mojodi remove_button mr-3" title="Add field"><i class="icon-minus"></i></a>\n' +
        '                                                        </div>\n' +
        '                                                    </div>\n' +
        '                                                </div>\n'; //New input field html
    var y = 1; //Initial field counter is 1


    //Once add button is clicked
    $(addButtonMojodi).click(function () {
        //Check maximum number of input fields
        if (y < maxField) {
            y++; //Increment field counter
            $(wrapperMojodi).append(fieldHTMLMojodi); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapperMojodi).on('click', '.remove_button', function (e) {
        e.preventDefault();
        $(this).closest('.form-row').remove(); //Remove field html
        y--; //Decrement field counter
    });

    /////////////////////////Add Dynamically UserSans Anbar///////////////
    var maxField = 10; //Input fields increment limitation
    var addButtonUserSans = $('.user_sans.add_button'); //Add button selector
    var wrapperUserSans = $('.user_sans.wrapper'); //Input field wrapper
    var fieldHTMLUserSans = '  <div class="form-row align-items-center">\n' +
        '                                                    <div class="form-group col-md-5">\n' +
        '                                                        <div class="field_wrapper">\n' +
        '                                                            <div class="input-group mb-2">\n' +
        '                                                                <div class="input-group-prepend">\n' +
        '                                                                    <div class="input-group-text">نام کارمند</div>\n' +
        '                                                                </div>\n' +
        '                                                                <select id="inputUser" class="form-control">\n' +
        '                                                                    <option selected>انتخاب</option>\n' +
        '                                                                    <option>...</option>\n' +
        '                                                                </select>                                                            </div>\n' +
        '                                                        </div>\n' +
        '                                                    </div>\n' +
        '                                                    <div class="form-group col-md-5">\n' +
        '                                                        <div class="field_wrapper">\n' +
        '                                                            <div class="input-group mb-2">\n' +
        '                                                                <div class="input-group-prepend">\n' +
        '                                                                    <div class="input-group-text">شماره سانس</div>\n' +
        '                                                                </div>\n' +
        '                                                                <select id="inputSans" class="form-control">\n' +
        '                                                                    <option selected>انتخاب</option>\n' +
        '                                                                    <option>...</option>\n' +
        '                                                                </select>\n' +
        '                                                            </div>\n' +
        '                                                        </div>\n' +
        '                                                    </div>\n' +
        '                                                    <div class="form-group col-md-2">\n' +
        '                                                        <div class="field_wrapper">\n' +
        '                                                            <a href="javascript:void(0);" class="remove_button user_sans mr-3" title="Add field"><i class="icon-minus"></i></a>\n' +
        '                                                        </div>\n' +
        '                                                    </div>\n' +
        '                                                </div>'; //New input field html
    var z = 1; //Initial field counter is 1


    //Once add button is clicked
    $(addButtonUserSans).click(function () {
        //Check maximum number of input fields
        if (z < maxField) {
            z++; //Increment field counter
            $(wrapperUserSans).append(fieldHTMLUserSans); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapperUserSans).on('click', '.remove_button', function (e) {
        e.preventDefault();
        $(this).closest('.form-row').remove(); //Remove field html
        z--; //Decrement field counter
    });

    //////////////////////// Wizard Form ////////////////////////

    $('.nexttab').click(function () {
        var nextId = $(this).parents('.tab-pane').next().attr("id");
        $('[href="#' + nextId + '"]').tab('show');
    });

    $('.prevtab').click(function () {
        var nextId = $(this).parents('.tab-pane').prev().attr("id");
        $('[href="#' + nextId + '"]').tab('show');
    });
    /********************************** Image Background *************************/
    $('.background-image-maker').each(function () {
        var imgURL = $(this).next('.holder-image').find('img').attr('src');
        $(this).css('background-image', 'url(' + imgURL + ')');
    });


    /*==============================================================
     Form Validation
     ============================================================= */
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });

    /*==============================================================
     Sidebar Settings
     ============================================================= */
    //
    // var settinghtml = `<div id="settings" class="">
    //         <a href="#" id="settingbutton" class="setting">
    //             <h5 class="mb-0"><i class="icon-settings"></i></h5>
    //         </a>
    //         <div class="sidbarchat p-3">
    //             <h5 class="mb-0">TEMPLATE CUSTOMIZER</h5>
    //             <p>Customize your template</p>
    //             <hr/>
    //             <h6>TEMPLATE COLOR</h6>
    //             <ul class="list-inline float-left claerfix">
    //                 <li class="color-box m-2 list-inline-item float-left color1" data-color="#7367f0"></li>
    //                 <li class="color-box m-2 list-inline-item float-left color2" data-color="#0bb2d4"></li>
    //                 <li class="color-box m-2 list-inline-item float-left color3" data-color="#17b3a3"></li>
    //                 <li class="color-box m-2 list-inline-item float-left color4" data-color="#eb6709"></li>
    //                 <li class="color-box m-2 list-inline-item float-left color5" data-color="#76c335"></li>
    //                 <li class="color-box m-2 list-inline-item float-left color6" data-color="#3e8ef7"></li>
    //                 <li class="float-left list-inline-item"><input type="color" class="cursor-pointer color m-2"  value="#7367f0"></li>
    //             </ul>
    //             <hr class="float-left w-100"/>
    //             <h6>TEMPLATE LAYOUT</h6>
    //             <label class="chkbox">Vertical
    //                 <input name="layout" value="vertical" class="layout" checked="checked" type="radio" >
    //                 <span class="checkmark"></span>
    //             </label>
    //             <label class="chkbox ml-2">Horizontal
    //                 <input name="layout" value="horizontal" class="layout" type="radio" >
    //                 <span class="checkmark"></span>
    //             </label>
    //
    //             <hr class="float-left w-100"/>
    //             <h6>TEMPLATE STYLE</h6>
    //             <label class="chkbox">Light
    //                 <input name="style" value="light" class="style" checked="checked" type="radio" >
    //                 <span class="checkmark"></span>
    //             </label> <br/>
    //             <label class="chkbox">Semi Dark
    //                 <input name="style" value="semi-dark" class="style" type="radio" >
    //                 <span class="checkmark"></span>
    //             </label>
    //             <label class="chkbox ml-2">Semi Dark Alt
    //                 <input name="style" value="semi-dark-alt" class="style" type="radio" >
    //                 <span class="checkmark"></span>
    //             </label><br/>
    //             <label class="chkbox">Dark
    //                 <input name="style" value="dark" class="style" type="radio" >
    //                 <span class="checkmark"></span>
    //             </label>
    //             <label class="chkbox ml-2">Dark Alt
    //                 <input name="style" value="dark-alt" class="style" type="radio" >
    //                 <span class="checkmark"></span>
    //             </label>
    //
    //             <hr class="float-left w-100"/>
    //             <label class="chkbox boxed mb-2">Boxed Layout
    //                 <input name="boxed" value="bodex" class="boxedlayout" type="checkbox" >
    //                 <span class="checkmark"></span>
    //             </label><br/>
    //             <label class="chkbox compact">Compact Sidebar
    //                 <input name="compact" value="compact" class="sidebar" type="checkbox" >
    //                 <span class="checkmark"></span>
    //             </label>
    //             <label class="chkbox smail-icon">Small Menu Icon
    //                 <input name="compact" value="small-meni-icon" class="menuicon" type="checkbox" >
    //                 <span class="checkmark"></span>
    //             </label>
    //
    //         </div>
    //     </div>`;
    //
    // $("body").append(settinghtml);
    //
    // $('.setting').on('click', function () {
    //     $('#settings').toggleClass('active');
    //     return false;
    // });


    var uri = window.location.href.toString();
    if (uri.indexOf("?") > 0) {
        delete_cookie('menulayout');
        delete_cookie('themecolor');
        delete_cookie('sidebarstyle');
        delete_cookie('boxed');
        delete_cookie('menuicon');
    }
//////////////////// menu Layout //////////////////////

    $('.layout').on('click', function () {
        if ($(this).val() == 'horizontal') {
            $('body').addClass('horizontal-menu');
            $('.compact').hide();
            $(".sidebar .slimScrollBar,.sidebar .slimScrollRail").remove();
            $(".sidebar .slimScrollDiv").contents().unwrap();
            $('#side-menu').attr('style', '');
            $('#side-menu ul').attr('style', '');

            createCookie('menulayout', 'horizontal-menu');
        } else {
            $('body').removeClass('horizontal-menu');
            $('.compact').show();
            $('body:not(.horizontal-menu) #side-menu').slimScroll({
                height: '640px',
                color: '#fff'
            });

            delete_cookie('menulayout');
        }
    });

    var layout = getUrlParameter('layout');

    if (layout == 'horizontal') {
        createCookie('menulayout', 'horizontal-menu');
    }


    var menulayout = getCookie("menulayout");
    if (menulayout == 'horizontal-menu') {
        $('body').addClass(menulayout);
        $('.compact').hide();
        if ($(window).width() > 991) {
            $(".sidebar .slimScrollBar,.sidebar .slimScrollRail").remove();
            $(".sidebar .slimScrollDiv").contents().unwrap();
            $('#side-menu').attr('style', '');
            $('#side-menu ul').attr('style', '');
        }
        $(".layout[value='horizontal']").prop('checked', true);
    }


////////////////////////////// Template  Color /////////////////////////

    $(".color-box").on('click', function () {
        $("input.color").val($(this).data('color'));
        $('body').css("--primarycolor", $("input.color").val());
        $('.dark').css("--primarycolor", $("input.color").val());
        $('.semi-dark').css("--primarycolor", $("input.color").val());
        $('.semi-dark-alt').css("--primarycolor", $("input.color").val());
        createCookie('cookiesprimarycolor', $("input.color").val());
    });
    $("input.color").on('change', function () {
        $('body').css("--primarycolor", $("input.color").val());
        $('.dark').css("--primarycolor", $("input.color").val());
        $('.semi-dark').css("--primarycolor", $("input.color").val());
        $('.semi-dark-alt').css("--primarycolor", $("input.color").val());
        createCookie('cookiesprimarycolor', $(this).val());
    });

    var cookiesprimarycolor = getCookie("cookiesprimarycolor");
    if (cookiesprimarycolor != null && cookiesprimarycolor != '') {
        $("input.color").val(cookiesprimarycolor);
        $('body').css("--primarycolor", cookiesprimarycolor);
        $('.dark').css("--primarycolor", cookiesprimarycolor);
        $('.semi-dark').css("--primarycolor", cookiesprimarycolor);
        $('.semi-dark-alt').css("--primarycolor", cookiesprimarycolor);
    }

//////////////////////////// Template Style //////////////////////////////////

    $('.style').on('click', function () {
        $('body').removeClass('light dark semi-dark dark-alt semi-dark-alt');
        $('body').addClass($(this).val());
        $('html').css("--primarycolor", $("input.color").val());
        $('.dark').css("--primarycolor", $("input.color").val());
        $('.semi-dark').css("--primarycolor", $("input.color").val());
        $('.semi-dark-alt').css("--primarycolor", $("input.color").val());
        createCookie('themecolor', $(this).val());
    });

    var themecolor = getUrlParameter('themecolor');
    if (themecolor != null && themecolor != '') {
        createCookie('themecolor', themecolor);
    }

    var themecolor = getCookie("themecolor");
    if (themecolor != null && themecolor != '') {
        $('body').addClass(themecolor);
        $(".style[value='" + themecolor + "']").prop('checked', true);
    }

///////////////////////////// Compact Menu /////////////////////////////

    $('.sidebar').on('click', function () {
        if ($(this).is(':checked')) {
            $('body').addClass('compact-menu');
            $('.smail-icon').hide();
            createCookie('sidebarstyle', 'compact-menu');
        } else {
            $('body').removeClass('compact-menu');
            $('.smail-icon').show();
            delete_cookie('sidebarstyle');
        }
    });

    var sidebarstyle = getUrlParameter('sidebarstyle');
    if (sidebarstyle != null && sidebarstyle != '') {
        createCookie('sidebarstyle', sidebarstyle);
    }

    var sidebarstyle = getCookie("sidebarstyle");
    if (sidebarstyle != null && sidebarstyle != '') {
        $('body').addClass(sidebarstyle);
        $('.smail-icon').hide();
        $(".sidebar").prop('checked', true);
    }

///////////////////////////// Boxed Layout /////////////////////////////

    $('.boxedlayout').on('click', function () {
        if ($(this).is(':checked')) {
            $('body').addClass('boxed');
            createCookie('boxed', 'boxed');
        } else {
            $('body').removeClass('boxed');
            delete_cookie('boxed');
        }
    });

    var boxedstyle = getUrlParameter('boxed');
    if (boxedstyle != null && boxedstyle != '') {
        createCookie('boxed', boxedstyle);
    }

    var boxedstyle = getCookie("boxed");
    if (boxedstyle != null && boxedstyle != '') {
        $('body').addClass(boxedstyle);
        $(".boxedlayout").prop('checked', true);
    }


//////////////////////////////////// Menu Icon ////////////////////////////

    $('.menuicon').on('click', function () {
        if ($(this).is(':checked')) {
            $('body').addClass('small-menu-icon');
            $('.compact').hide();
            createCookie('menuicon', 'small-menu-icon');
        } else {
            $('body').removeClass('small-menu-icon');
            $('.compact').show();
            delete_cookie('menuicon');
        }
    });

    var menuiconstyle = getUrlParameter('menuicon');
    if (menuiconstyle != null && menuiconstyle != '') {
        createCookie('menuicon', menuiconstyle);
    }

    var menuiconstyle = getCookie("menuicon");
    if (menuiconstyle != null && menuiconstyle != '') {
        $('body').addClass(menuiconstyle);
        $('.compact').hide();
        $(".menuicon").prop('checked', true);
    }


/////////////////////////// Remove query string ///////////////////


    if (uri.indexOf("?") > 0) {
        var clean_uri = uri.substring(0, uri.indexOf("?"));
        window.history.replaceState({}, document.title, clean_uri);
    }

})(jQuery);

function createCookie(name, value) {
    var now = new Date();
    now.setTime(now.getTime() + 1 * 3600 * 1000);
    document.cookie = name + "=" + value + ";expires=" + now.toUTCString() + "; path=/pollo";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function delete_cookie(name) {
    document.cookie = name + '=; Path=/pollo; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
}


///////// Get City By Ostan Id
$('.ostan').change(function () {
    const id = this.value;
    const cityInput = $('.city');
    if (isNaN(id)) {
        return false;
    }
    $.ajax({
        type: 'GET',
        url: "http://test.php/admin/get-cities/" + id,
        timeout: 6000,
        beforeSend: function () {
            const preLoaderGif = '<div class="spinner-border spinner-border-sm" role="status"></div>';

            $('.city-text').html(preLoaderGif);
        },
        success: function (data) {
            if (data == 0) {
                toastr.error('دوشواری داریم')
            } else {
                $('.city-text').html('شهر');
                var city = "";
                data.forEach(function (value) {
                    city += "<option value=\"" + value.id + "\">" + value.name + "</option>";
                    cityInput.html(city);
                })
            }
        },
        error: function (xhr) {
            toastr.error('دوشواری داریم')
        }
    });
});
