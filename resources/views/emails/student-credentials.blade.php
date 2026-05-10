<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credenciales de Acceso - Fundación Lengua Española</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #007bff;
        }
        .logo {
            color: #007bff;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .credentials-box {
            background-color: #f8f9fa;
            border: 2px solid #007bff;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            text-align: center;
        }
        .credential-item {
            margin: 15px 0;
        }
        .credential-label {
            font-weight: bold;
            color: #495057;
            display: block;
            margin-bottom: 5px;
        }
        .credential-value {
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
            background-color: #ffffff;
            padding: 8px 15px;
            border-radius: 4px;
            border: 1px solid #dee2e6;
            display: inline-block;
        }
        .warning {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 4px;
            padding: 15px;
            margin: 20px 0;
        }
        .warning-title {
            font-weight: bold;
            color: #856404;
            margin-bottom: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
            font-size: 14px;
            color: #6c757d;
        }
        .login-button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">Fundación Lengua Española</div>
            <p>¡Bienvenido a tu portal de estudiante!</p>
        </div>

        <h2>Hola {{ $user->name }},</h2>
        
        <p>¡Felicidades! Tu pago ha sido procesado exitosamente y ahora tienes acceso completo a tu portal de estudiante.</p>
        
        <p>A continuación encontrarás tus credenciales de acceso:</p>

        <div class="credentials-box">
            <div class="credential-item">
                <span class="credential-label">ID de Estudiante:</span>
                <div class="credential-value">{{ $studentId }}</div>
            </div>
            <div class="credential-item">
                <span class="credential-label">Contraseña:</span>
                <div class="credential-value">{{ $password }}</div>
            </div>
        </div>

        <div class="warning">
            <div class="warning-title">⚠️ Importante - Seguridad de tu Cuenta</div>
            <ul style="margin: 0; padding-left: 20px;">
                <li>Guarda estas credenciales en un lugar seguro</li>
                <li>No compartas tu ID de estudiante y contraseña con nadie</li>
                <li>Te recomendamos cambiar tu contraseña después del primer inicio de sesión</li>
                <li>Si tienes problemas para acceder, contacta con soporte</li>
            </ul>
        </div>

        <div style="text-align: center;">
            <a href="{{ url('/login') }}" class="login-button">Iniciar Sesión Ahora</a>
        </div>

        <h3>¿Qué puedes hacer en tu portal?</h3>
        <ul>
            <li>Acceder a tus cursos y materiales de estudio</li>
            <li>Revisar el estado de tus pedidos</li>
            <li>Comunicarte con nuestro equipo de soporte</li>
            <li>Actualizar tu información personal</li>
            <li>Descargar certificados y documentos</li>
        </ul>

        <div class="footer">
            <p><strong>Fundación Lengua Española</strong><br>
            Tu centro de aprendizaje del idioma español</p>
            
            <p>Si tienes alguna pregunta, no dudes en contactarnos.<br>
            <strong>Email:</strong> soporte@fundacionlengua.com<br>
            <strong>Teléfono:</strong> +34 XXX XXX XXX</p>
            
            <p><small>Este email fue enviado automáticamente. Por favor, no respondas a este mensaje.</small></p>
        </div>
    </div>
</body>
</html>