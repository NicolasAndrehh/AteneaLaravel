<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Empleados</title>
    <style>
        * {
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        }
        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            text-align: center
        }

        table {
            border-collapse: collapse;
        }

        .table .thead-dark th {
            color: #fff;
            background-color: #212529;
            border-color: #32383e;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        .table td, .table th {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        th {
            text-align: center;
            font-weight: bolder;
        }
    </style>
</head>
<body>
    <table class="table">
        <thead class="thead-dark">
            <th>Id</th>
            <th>Num Documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Ciudad</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Cargo</th>
            <th>Creado desde</th>
            <th>Actualizado por ultima vez</th>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)

            <tr>
                <td>{{ $empleado->id }}</td>
                <td>{{ $empleado->num_documento }}</td>
                <td>{{ $empleado->nombres }}</td>
                <td>{{ $empleado->apellidos }}</td>
                <td>{{ $empleado->ciudad }}</td>
                <td>{{ $empleado->direccion }}</td>
                <td>{{ $empleado->telefono }}</td>
                <td>{{ $empleado->correo }}</td>
                <td>{{ $empleado->cargo }}</td>
                <td>{{ $empleado->created_at }}</td>
                <td>{{ $empleado->updated_at }}</td>
            </tr>

            @endforeach
        </tbody>
    </table>
</body>
</html>
