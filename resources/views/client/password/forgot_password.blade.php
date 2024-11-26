<!doctype html>
<html lang="en">

<head>
	@include('admin.share.css')
</head>

<body>

    <!-- Start header area -->

    <!-- End header area -->


    <main id="app" class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a href="/">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span>Account</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start login section  -->
        <div class="login__section section--padding">
            <div class="container">
                <div class="login__section--inner">
                    <div class="row row-cols-md-1 row-cols-1">
                        <div class="col">
                            <div class="account__login">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title mb-10">Quên Mật Khẩu</h2>
                                    <p class="account__login--header__desc">Nhập vào email đăng nhập để lấy lại mật khẩu</p>
                                </div>
                                <div class="account__login--inner">
                                    <label>
                                        <input v-model="thong_tin.email" class="account__login--input" placeholder="Nhập vào email"
                                            type="email">
                                    </label>
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                    <button v-on:click="resetPassword()" class="account__login--btn primary__btn" type="button">Gửi</button>
                                    </div>
                                    <div class="account__login--divide">
                                        <span class="account__login--divide__text">OR</span>
                                    </div>
                                    <div class="account__social d-flex justify-content-center mb-15">
                                        <a class="account__social--link facebook"
                                            href="/login">Đăng Nhập</a>
                                        <a class="account__social--link google"
                                            href="/register">Đăng Ký</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End login section  -->

        <!-- Start shipping section -->

        <!-- End shipping section -->

    </main>



    <!-- Scroll top bar -->
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                d="M112 244l144-144 144 144M256 120v292" />
        </svg></button>

    <!-- All Script JS Plugins here  -->
    <script src="asstes_client_login_regis/js/vendor/popper.js" defer="defer"></script>
    <script src="asstes_client_login_regis/js/vendor/bootstrap.min.js" defer="defer"></script>
    <script src="asstes_client_login_regis/js/plugins/swiper-bundle.min.js"></script>
    <script src="asstes_client_login_regis/js/plugins/glightbox.min.js"></script>

    <!-- Customscript js -->
    <script src="asstes_client_login_regis/js/script.js"></script>
    <script>
        new Vue({
            el      :   '#app',
            data    :   {
                thong_tin   :   {},
            },
            methods :   {
                resetPassword() {
                    axios
                        .post('{{ Route("resetPassword") }}', this.thong_tin)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },
            },
        });
    </script>
</body>

</html>
