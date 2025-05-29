<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Solicitud</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Editar Solicitud</h1>
            <a href="{{ route('solicitudes.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded shadow">
                ← Volver
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <strong>¡Atención!</strong> Por favor corrige los siguientes errores:
                <ul class="list-disc list-inside mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('solicitudes.update', $solicitud->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="tema" class="block font-medium mb-1">Tema</label>
                <input type="text" name="tema" id="tema" class="w-full border-gray-300 rounded p-2" required value="{{ old('tema', $solicitud->tema) }}">
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block font-medium mb-1">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="3" class="w-full border-gray-300 rounded p-2" required>{{ old('descripcion', $solicitud->descripcion) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="area" class="block font-medium mb-1">Área</label>
                <select name="area" id="area" class="w-full border-gray-300 rounded p-2" required>
                    @foreach(['It', 'Contabilidad', 'Administrativo', 'Operativo'] as $area)
                        <option value="{{ $area }}" {{ old('area', $solicitud->area) == $area ? 'selected' : '' }}>{{ $area }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="fecha_registro" class="block font-medium mb-1">Fecha de Registro</label>
                <input type="date" name="fecha_registro" id="fecha_registro" class="w-full border-gray-300 rounded p-2" required value="{{ old('fecha_registro', $solicitud->fecha_registro) }}">
            </div>

            <div class="mb-4">
                <label for="fecha_cierre" class="block font-medium mb-1">Fecha de Cierre</label>
                <input type="date" name="fecha_cierre" id="fecha_cierre" class="w-full border-gray-300 rounded p-2" value="{{ old('fecha_cierre', $solicitud->fecha_cierre) }}">
            </div>

            <div class="mb-4">
                <label for="estado" class="block font-medium mb-1">Estado</label>
                <select name="estado" id="estado" class="w-full border-gray-300 rounded p-2" required>
                    @foreach(['Solicitado', 'Aprobado', 'Rechazado'] as $estado)
                        <option value="{{ $estado }}" {{ old('estado', $solicitud->estado) == $estado ? 'selected' : '' }}>{{ $estado }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="observacion" class="block font-medium mb-1">Observación</label>
                <textarea name="observacion" id="observacion" rows="2" class="w-full border-gray-300 rounded p-2">{{ old('observacion', $solicitud->observacion) }}</textarea>
            </div>

            <div class="mb-6">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="usuarioExt" value="1" class="form-checkbox h-5 w-5 text-blue-600" {{ old('usuarioExt', $solicitud->usuarioExt) ? 'checked' : '' }}>

                    <span class="ml-2">¿Usuario Externo?</span>
                </label>
            </div>

            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded shadow">
                Guardar Cambios
            </button>
        </form>
    </div>

</body>
</html>