<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Password</title>
    <link rel="icon" href="<?=base_url('assets/img/bigdata.ico');?>" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/27e56cd4ff.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/css');?>/icofont/icofont.min.css">
    <style>
    body {
        font-family: 'Kanit', sans-serif;
        color: #63615f;
        font-size: 14px;
    }

    .login {
        height: 100vh;
        min-height: 100vh;
        background-image: url("<?=base_url('assets/img/bg.jpg');?>");
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
        padding-top: 8%;
    }

    @media only screen and (max-width: 700px) {
        .login {
            padding-top: 20%;
        }
    }
    </style>
</head>

<body>
    <section class="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="card">
                        <div class="card-body pb-4">
                            <form action="" method="post">
                                <h4 class="text-center">New Password</h4>
                                <hr width="30%">
                                <label>E-mail :</label>
                                <?=form_error('username', '<small class="text-danger">', '</small>');?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="icofont-envelope"></i></span>
                                    </div>
                                    <input type="text" name="username" class="form-control form-control-sm"
                                        value="<?=$empl_email;?>" readonly>
                                </div>
                                <label>New Password :</label>
                                <?=form_error('new_password', '<small class="text-danger">', '</small>');?>
                                <div class="input-group mb-3 pb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="icofont-key"></i></span>
                                    </div>
                                    <input type="password" name="new_password" class="form-control form-control-sm"
                                        placeholder="Input your password">
                                </div>
                                <hr class="pt-2">
                                <div class="row">
                                    <div class="col">
                                        <a href="<?=base_url('');?>" class="btn btn-sm btn-warning btn-block"><i
                                                class="fas fa-chevron-circle-left"></i>&nbsp; Cancel</a>
                                    </div>

                                    <div class="col">
                                        <button type="submit" class="btn btn-sm btn-primary btn-block"><i
                                                class="fas fa-unlock-alt"></i>&nbsp; Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?=base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
const flashSuccess = $('.flash-data').data('success');
const flashError = $('.flash-data').data('error');
const flashWarning = $('.flash-data').data('warning');
const flashLogin = $('.flash-data').data('login');

if (flashSuccess) {
    Swal.fire(
        'Congratulations !',
        '' + flashSuccess,
        'success'
    )
} else if (flashError) {
    Swal.fire(
        'Error !',
        '' + flashError,
        'error'
    )
} else if (flashLogin) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    Toast.fire({
        type: 'success',
        title: '' + flashLogin
    })
} else if (flashWarning) {
    Swal.fire(
        'Information !',
        '' + flashWarning,
        'info'
    )
}
</script>

</html>