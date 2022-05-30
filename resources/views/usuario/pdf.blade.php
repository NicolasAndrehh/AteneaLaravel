<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Usuarios</title>
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
            <th>Nombre Usuario</th>
            <th>Correo</th>
            <th>Empleado Id</th>
            <th>Rol Id</th>
            <th>Creado desde</th>
            <th>Actualizado por ultima vez</th>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)

            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->empleadoId }}</td>
                <td>{{ $usuario->rolId }}</td>
                <td>{{ $usuario->created_at }}</td>
                <td>{{ $usuario->updated_at }}</td>
            </tr>

            @endforeach
        </tbody>
    </table>
</body>
</html>
