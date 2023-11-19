<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="SABER" />
	<meta property="og:title" content="SABER" />
	<meta property="og:description" content="SABER" />
	<meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png" />
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>SABER</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{url('public')}}/mimin/images/favicon.png" />
    <link href="{{url('public')}}/mimin/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="{{url('public')}}/mimin/images/SABER-hitam.png" width="90%" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">Masuk dengn akun anda</h4>
                                    <form action="{{ url('mimin/login') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Usernama</strong></label>
                                            <input type="text" class="form-control" name="nip" placeholder="Usename">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{url('public')}}/mimin/vendor/global/global.min.js"></script>
    <script src="{{url('public')}}/mimin/js/custom.min.js"></script>
    <script src="{{url('public')}}/mimin/js/dlabnav-init.js"></script>

</body>
</html>
