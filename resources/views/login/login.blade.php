<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <title>Ingreso</title>
    </head>
    <body>
        <div class="contenedor">
            <header class="cabecera">
                <img src="https://cutt.ly/mYEsqLZ" alt="">
                <div class="titulo">
                    <h1>Hotel Mi Viejo Molino</h1>
                </div>
            </header>
            <!-- <div class="card-header">{{ __('Login') }}</div> -->
            <main class="principal">
                <div class="contenido-main">
                    <div class="ingreso">
                        <h2>Ingreso al sistema</h2>
                        <form class="formulario" action="{{ route('login') }}" method="POST">
                            <div class="campo">
                                <input class=" input-text"type="text" name="nombreUsuario" value="{{ old('name') }}" placeholder="Usuario">
                            </div>
                            <div class="campo">
                                <input class="input-text   @error('password') is-invalid @enderror"type="password" name="passwordUsuario" placeholder="Contraseña"  required >
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="boton-f">
                            <button type="submit" class="boton">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            
                    </form>
                    </div>
                </div>
            

            </main>
        </div>
        
    </body>
</html>