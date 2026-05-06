@extends('layouts.app')

@section('content')

<div class="card p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Productos</h2>

        <a href="{{ route('products.create') }}" class="btn btn-primary">
            + Nuevo Producto
        </a>
    </div>

    <form method="GET" action="{{ route('products.index') }}" class="mb-4">

    <div class="row align-items-center">

        <div class="col-md-10">

            <div class="input-group">

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Buscar producto..."
                    value="{{ request('search') }}"
                >

                @if(request('search'))
                    <a
                        href="{{ route('products.index') }}"
                        class="btn btn-outline-secondary"
                        title="Limpiar búsqueda"
                    >
                        ✕
                    </a>
                @endif

            </div>

        </div>

        <div class="col-md-2">

            <button class="btn btn-dark w-100">
                Buscar
            </button>

        </div>

    </div>

    </form>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                
                <th class="text-center">Nombre</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Categoría</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>

        <tbody>

            @forelse($products as $product)

                <tr>
                        <td class="text-center">
                            {{ $product->name }}
                        </td>

                        <td class="text-center">
                            {{ $product->quantity }}
                        </td>

                        <td class="text-center">
                            <span class="badge bg-primary">
                                {{ $product->category->name }}
                            </span>
                        </td>

                        <td class="text-center">

                        <a
                            href="{{ route('products.edit', $product->id) }}"
                            class="btn btn-warning btn-sm"
                        >
                            Editar
                        </a>

                        <form
                            action="{{ route('products.destroy', $product->id) }}"
                            method="POST"
                            class="d-inline"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this product?')"
                            >
                                Eliminar
                            </button>

                        </form>

                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="4" class="text-center">
                        Productos no encontrados
                    </td>
                </tr>

            @endforelse

        </tbody>
    </table>

</div>

@endsection