@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Currículum</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cvs.update', $cv) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $cv->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $cv->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="education" class="form-label">Educación</label>
            <textarea class="form-control" id="education" name="education" rows="3" required>{{ old('education', $cv->education) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="experience" class="form-label">Experiencia Laboral</label>
            <textarea class="form-control" id="experience" name="experience" rows="3" required>{{ old('experience', $cv->experience) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="skills" class="form-label">Habilidades</label>
            <textarea class="form-control" id="skills" name="skills" rows="2" required>{{ old('skills', $cv->skills) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="languages" class="form-label">Idiomas</label>
            <textarea class="form-control" id="languages" name="languages" rows="2" required>{{ old('languages', $cv->languages) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="{{ route('cvs.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
