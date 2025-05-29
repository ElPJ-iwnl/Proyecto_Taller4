<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Solicitudes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function openModal(id) {
            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('deleteForm').action = '/solicitudes/' + id;
        }
        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Lista de solicitudes</h1>
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
                        <th class="px-6 py-3">Fecha Cierre</th>
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
                            <td class="px-6 py-4">{{ $solicitud->fecha_cierre ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $solicitud->estado }}</td>
                            <td class="px-6 py-4">{{ $solicitud->usuario }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('solicitudes.edit', $solicitud->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                                <button
                                    onclick="openModal({{ $solicitud->id }})"
                                    class="text-red-600 hover:underline cursor-pointer">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-6 py-4 text-center text-gray-500">No hay solicitudes registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6">
            <h2 class="text-xl font-semibold mb-4">¿Estás seguro que quieres eliminar esta solicitud?</h2>
            <div class="flex justify-end space-x-4">
                <button onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancelar</button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
