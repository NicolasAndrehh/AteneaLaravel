@include('layouts.header')

<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<link rel="stylesheet" href="{{ asset('css/empleados.css') }}">

@include('layouts.fondo')

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<section class="modal modal--show">
                <section class="modalfondo">
                    <h1>Modificar empleado</h1>
                    
                    <form action="{{ url('empleado/') }}" method="POST" id="formulario" enctype="multipart/form-data">
                    @csrf

                        @include('empleado.form')    

                    </form>
                  
                </section>
                
            </section>
            <script src="{{ asset('js/main.js') }}"></script>
@include('layouts.footer')