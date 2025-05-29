<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Solicitudes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Solicitudes Registradas</h1>
            <a href="{{ route('solicitudes.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">
                + Nueva Solicitud
            </a>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-200 text-gray-700 uppercase text-xs font-bold">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Tema</th>
                        <th class="px-6 py-3">Descripción</th>
                        <th class="px-6 py-3">Área</th>
                        <th class="px-6 py-3">Fecha Registro</th>
                        <th class="px-6 py-3">Estado</th>
                        <th class="px-6 py-3">Usuario</th>
                        <th class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($solicitudes as $solicitud)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $solicitud->id }}</td>
                            <td class="px-6 py-4">{{ $solicitud->tema }}</td>
                            <td class="px-6 py-4">{{ $solicitud->descripcion }}</td>
                            <td class="px-6 py-4">{{ $solicitud->area }}</td>
                            <td class="px-6 py-4">{{ $solicitud->fecha_registro }}</td>
                            <td class="px-6 py-4">{{ $solicitud->estado }}</td>
                            <td class="px-6 py-4">{{ $solicitud->usuario }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('solicitudes.show', $solicitud->id) }}" class="text-blue-600 hover:underline">Ver</a>
                                <a href="{{ route('solicitudes.edit', $solicitud->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                                <form action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-gray-500">No hay solicitudes registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
