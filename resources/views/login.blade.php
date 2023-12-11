<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/assets/css/main/app.css">
    <link rel="stylesheet" href="/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/images/logo/favicon.png" type="image/png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <h2 class="auth-title">Log in.</h2>
            <form id="form_login">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email" class="form-control form-control-xl" placeholder="Email" name="email" id="email">
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" placeholder="Password" id="password" name="password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" id="submit">Log in</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class="text-gray-600">Don't have an account? <a href="/register" class="font-bold">Sign
                        up</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>


    </div>
    <script src="/js/common.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>



<script>
    window.addEventListener("load", async function() {

        $("#submit").on("click", async function(e) {
            e.preventDefault()

            Swal.fire({
                text: "Data sudah benar ?",
                icon: 'warning',
                confirmButtonText: 'Login',
                reverseButtons: true,
                showCancelButton: true,
                cancelButtonText: 'Tidak',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
            }).then(async function(e) {
                if (e.value) {

                    let csrf = "<?= csrf_token() ?>"
                    const payload = $("#form_login").serialize() + `&_token=${csrf}`

                    $.ajax({
                        type: 'POST',
                        url: "/login",
                        data: payload,
                        success: function(data) {

                            Swal.fire({
                                title: "Login Success",
                                icon: "success",
                                focusConfirm: true,
                            }).then((e) => {
                                if (data.data.users.is_admin === 1) {
                                    window.location.href = `/admin`
                                } else {
                                    window.location.href = `/`
                                }
                            })

                        },
                        error: function(data) {
                            if (data.status === 422) {

                                Swal.fire({
                                    title: "Login Gagal! periksa data anda",
                                    icon: "error",
                                    focusConfirm: true,
                                }).then((e) => {
                                    window.location.href = "/login"
                                })

                            }
                        },
                    });
                }
            })
        })



    })
</script>



