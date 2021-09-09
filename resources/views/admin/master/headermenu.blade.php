<div id="nav-wrapper" class="nav-wrapper  bg-light">
    <nav class="navbar navbar-expand-lg navbar-light nav-master  px-1 px-lg-0">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{asset("dist")}}/images/logo.png" width="60" height="60" class="d-inline-block align-top" alt=""
                 loading="lazy">
            <span class="d-none d-lg-block">آسان تهاتر ایرانیان</span>
        </a>
        <!--Start Plus Icon-->

        <!--End Plus Icon-->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu-nav-wrapper"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-menu-nav-wrapper">
            <ul class="navbar-nav ml-auto menu">
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle navbarDropdown" href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="icon-support"></i>
                        <p>داشبورد</p>
                    </a>
                    <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <!--                            <div class="dropdown-divider"></div>-->
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle navbarDropdown" href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="icon-support"></i>
                        <p>گروه</p>
                    </a>
                    <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"href="{{route('group.index')}}">تعریف گروه</a>
                    </div>
                </li>
            </ul>

            <div class="navbar-right mr-auto d-none d-lg-block">
                <ul class="ml-auto p-0 m-0 list-unstyled d-flex">
                    <li class="dropdown user-profile d-inline-block py-1 mr-2">
                        <a href="#" class="nav-link px-2 py-0" data-toggle="dropdown" aria-expanded="false">
                            <div class="media">
                                <div class="media-body align-self-center d-none d-sm-block ml-2">
                                    <p class="mb-0 text-uppercase line-height-1"><b>جعفر
                                            عباسی</b><br/><span> ادمین </span></p>

                                </div>
                                <img src="{{asset("dist")}}/images/author.jpg" alt="" class="d-flex img-fluid rounded-circle"
                                     width="45">

                            </div>
                        </a>

                        <div class="dropdown-menu  dropdown-menu-left p-0">
                            <a href="#" class="dropdown-item px-2 align-self-center d-flex">
                                <span class="icon-pencil ml-2 h6 mb-0"></span> ویرایش پروفایل</a>
                            <a href="#" class="dropdown-item px-2 align-self-center d-flex">
                                <span class="icon-user ml-2 h6 mb-0"></span> نمایش پروفایل</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item px-2 align-self-center d-flex">
                                <span class="icon-support ml-2 h6  mb-0"></span> مرکز پشتیبانی</a>
                            <a href="#" class="dropdown-item px-2 align-self-center d-flex">
                                <span class="icon-globe ml-2 h6 mb-0"></span> انجمن</a>
                            <a href="#" class="dropdown-item px-2 align-self-center d-flex">
                                <span class="icon-settings ml-2 h6 mb-0"></span> تنظیمات حساب</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item px-2 text-danger align-self-center d-flex">
                                <span class="icon-logout ml-2 h6  mb-0"></span> خروج</a>
                        </div>

                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="d-block d-lg-none border-top py-1 mobile-profile">
        <div class="dropdown">
            <button class="btn btn-outline dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                <i class="icon-user"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#"><span class="icon-pencil ml-2 h6 mb-0"></span> ویرایش پروفایل</a>
                <a class="dropdown-item" href="#"><span class="icon-settings ml-2 h6 mb-0"></span> تنظیمات حساب</a>
                <a class="dropdown-item" href="#"><span class="icon-logout ml-2 h6  mb-0"></span>خروج </a>
            </div>
        </div>
    </div>
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </nav>
</div>
