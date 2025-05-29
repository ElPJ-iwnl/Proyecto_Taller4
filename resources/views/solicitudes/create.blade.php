<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Crear Solicitud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 2rem;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .form-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            padding: 2.5rem 3rem;
            max-width: 600px;
            width: 100%;
        }
        h1 {
            font-weight: 700;
            color: #4b3ca7;
        }
        .btn-back {
            background-color: #ddd;
            color: #4b3ca7;
            font-weight: 600;
            border-radius: 50px;
            padding: 0.5rem 1.3rem;
            transition: all 0.3s ease;
        }
        .btn-back:hover {
            background-color: #4b3ca7;
            color: white;
        }
        .btn-submit {
            background: #6e8efb;
            border: none;
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            box-shadow: 0 6px 12px rgba(110,142,251,0.6);
            transition: background 0.3s ease;
        }
        .btn-submit:hover {
            background: #556cd6;
            box-shadow: 0 8px 18px rgba(85,108,214,0.7);
        }
        label {
            font-weight: 600;
            color: #3b3b3b;
        }
        .form-check-label {
            color: #555;
            font-weight: 500;
        }
        .alert-danger {
            border-radius: 10px;
        }
        textarea.form-control {
            resize: vertical;
        }
    </style>
</head>
<body>
<div class="form-container mx-auto">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Crear Nueva Solicitud</h1>
        <a href="{{ route('solicitudes.index') }}" class="btn btn-back">
            ← Volver
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Atención!</strong> Por favor corrige los siguientes errores:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('solicitudes.store') }}" method="POST" novalidate>
        @csrf

        <div class="mb-3">
            <label for="tema" class="form-label">Tema</label>
            <input type="text" name="tema" id="tema" class="form-control" required value="{{ old('tema') }}" placeholder="Ejemplo: Problema con la impresora">
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required placeholder="Describe brevemente el problema o solicitud">{{ old('descripcion') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="area" class="form-label">Área</label>
            <select name="area" id="area" class="form-select" required>
                <option value="" disabled {{ old('area') ? '' : 'selected' }}>Selecciona un área</option>
                <option value="It" {{ old('area') == 'It' ? 'selected' : '' }}>IT</option>
                <option value="Contabilidad" {{ old('area') == 'Contabilidad' ? 'selected' : '' }}>Contabilidad</option>
                <option value="Administrativo" {{ old('area') == 'Administrativo' ? 'selected' : '' }}>Administrativo</option>
                <option value="Operativo" {{ old('area') == 'Operativo' ? 'selected' : '' }}>Operativo</option>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="fecha_registro" class="form-label">Fecha de Registro</label>
                <input type="date" name="fecha_registro" id="fecha_registro" class="form-control" required value="{{ old('fecha_registro') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="fecha_cierre" class="form-label">Fecha de Cierre</label>
                <input type="date" name="fecha_cierre" id="fecha_cierre" class="form-control" value="{{ old('fecha_cierre') }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="Solicitado" {{ old('estado') == 'Solicitado' ? 'selected' : '' }}>Solicitado</option>
                <option value="Aprobado" {{ old('estado') == 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
                <option value="Rechazado" {{ old('estado') == 'Rechazado' ? 'selected' : '' }}>Rechazado</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="observacion" class="form-label">Observación</label>
            <textarea name="observacion" id="observacion" class="form-control" rows="2" placeholder="Comentarios adicionales (opcional)">{{ old('observacion') }}</textarea>
        </div>

        <div class="mb-4 form-check">
            <input type="checkbox" name="usuarioExt" id="usuarioExt" value="1" class="form-check-input" {{ old('usuarioExt') ? 'checked' : '' }}>
            <label for="usuarioExt" class="form-check-label">¿Usuario Externo?</label>
        </div>

        <button type="submit" class="btn btn-submit w-100">Guardar Solicitud</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>