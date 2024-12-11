@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Lista de Currículums</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('cvs.create') }}" class="btn btn-primary mb-3">+ Crear Nuevo CV</a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cvs as $cv)
                <tr>
                    <td>{{ $cv->name }}</td>
                    <td>{{ $cv->email }}</td>
                    <td>
                        <a href="{{ route('cvs.edit', $cv) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="{{ route('cvs.download', $cv) }}" class="btn btn-success btn-sm">Descargar</a>
                        <form action="{{ route('cvs.destroy', $cv) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
