<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Trang</a></li>
                <li class="breadcrumb-spe breadcrumb-item text-sm text-dark" aria-current="page">Dashboard</li>
            </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input name="txtSearch" type="text" class="form-control" placeholder="Tìm kiếm...">
                </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- @{
                            var ticket = FormsAuthentication.Decrypt(Request.Cookies[".ASPXAUTH"].Value) ?? null;
                            if (ticket == null)
                            {
                                <script>
                                    window.location = '/Auth/SignOut'
                                </script>
                            }
                        }
                        @Session["username"].ToString() -->
                    </div>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdown">
                        <li><a class="dropdown-item" href="#">Thông tin người dùng</a></li>
                        <li><a class="dropdown-item" href="/Auth/SignOut">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    var btnContainer = document.getElementById("sidenav-collapse-main");
    var btns = btnContainer.getElementsByClassName("nav-link");

    var idText = document.getElementById("navbarBlur");
    var text = idText.getElementsByClassName("breadcrumb-spe");


    // Loop through the buttons and add the active class to the current/clicked button
    for (var i = 0; i < btns.length; i++) {
        if (btns[i].href == window.location.href) {
            text[0].innerHTML = window.location.pathname.split('/').pop().split('#')[0].split('?')[0];
        }
        if (window.location.pathname == "/") {
            text[0].innerHTML = "DashBoard";
        }
        btns[i].addEventListener("click", function () {
            text[0].innerHTML = window.location.pathname.split('/').pop().split('#')[0].split('?')[0];
        });
    }
</script>
