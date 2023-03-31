<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('css/signup.css') ?>">
</head>

<body>
    <div class="login-box">
        <h2>Este puede ser el inicio de algo nuevo</h2>

        <?php if (session('msg')) : ?>
            <div class="alert alert-<?= session('msg.type') ?> alert-dismissible fade show" role="alert">
                <small> <?= session('msg.body') ?> </small>
                <a href="<?= base_url('panel_control') ?>" class="btn btn-success">Ir al panel</a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form action="<?= base_url("signup") ?>" method="POST" class="d-flex gap-3">
            <div class="usuario1">
                <div class="user-box">
                    <input type="text" name="nombre" required="" id="user">
                    <label>Nombre</label>
                </div>

                <div class="user-box">
                    <input type="text" name="apellido" required="" id="user">
                    <label>Apellido</label>
                </div>

                <div class="user-box">
                    <input type="text" name="usuario" required="" id="user">
                    <label>Usuario</label>
                </div>

                <div class="user-box">
                    <input type="password" name="contraseña" required="" id="pass">
                    <label>Contraseña</label>
                </div>
            </div>

            <div class="usuario2">
                <div class="user-box">
                    <input type="password" name="confirm_contraseña" required="" id="pass">
                    <label>Repetir contraseña</label>
                </div>

                <div class="user-box">
                    <input type="text" name="red_social" required="" id="pass">
                    <label>Link red social</label>
                </div>

                <div class="user-box">
                    <textarea name="descripcion" id="descripcion" cols="25" rows="5" maxlength="500" placeholder="Descripción del autor"></textarea>
                </div>

                <div class="user-box">
                    <select class="form-select form-select-sm" style="background-color: #dad527;" name="puesto" aria-label=".form-select-sm example">
                        <option selected>Elegir puesto</option>
                        <option value="Editor">Editor</option>
                        <option value="Redactora">Redactora</option>
                        <option value="Redactor">Redactor</option>
                        <option value="Invitado">Invitado</option>
                        <option value="Invitada">Invitada</option>
                    </select>
                </div>

                <button type="submit" class="btn__submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Crear
                </button>

                <div>
                    <a href="<?= base_url('login') ?>" class="forgot_pass mt-4">Ya tengo usuario</a>
                </div>

            </div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>