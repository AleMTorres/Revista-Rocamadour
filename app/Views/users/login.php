<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
</head>

<body>
    <div class="login-box">
        <h2>Bienvenido de nuevo, replicante</h2>

        <?php if (session('msg')) : ?>
            <div class="alert alert-<?= session('msg.type') ?> alert-dismissible fade show" role="alert">
                <small> <?= session('msg.body') ?> </small>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('login') ?>" method="POST">
            <div class="user-box">
                <input type="text" name="usuario" required="" id="user">
                <label>Usuario</label>
            </div>

            <div class="user-box">
                <input type="password" name="contraseña" required="" id="pass">
                <label>Contraseña</label>
            </div>

            <div class="links">
                <div>
                    <a href="https://www.alz.org/alzheimer-demencia/tratamientos" class="forgot_pass">Olvidé mi contraseña</a>
                </div>
            </div>

            <button type="submit" class="btn__submit mt-5">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Entrar
            </button>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>