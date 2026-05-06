@extends('layouts.app')

@section('content')

<div class="card p-4">

    <div class="mb-4">
        <h2>Crea un Producto</h2>
        <p class="text-muted">Registra un nuevo producto en el sistema.</p>
    </div>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre del producto</label>
            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}"
                placeholder="Ejemplo: Mouse inalámbrico"
            >

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Cantidad</label>
            <input
                type="number"
                name="quantity"
                class="form-control @error('quantity') is-invalid @enderror"
                value="{{ old('quantity') }}"
                placeholder="Ejemplo: 25"
                min="0"
            >

            @error('quantity')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label">Categoría del producto</label>
            <select
                name="category_id"
                class="form-select @error('category_id') is-invalid @enderror"
            >
                <option value="">Selecciona una categoría</option>

                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

            <button type="submit" class="btn btn-primary">
                Guardar producto
            </button>
        </div>
    </form>

</div>

@endsection