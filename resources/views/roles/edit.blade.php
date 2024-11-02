@extends('layout.main')
@section('title', 'Edit')
@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="container mt-5 w-50">
            <h2 class="text-center mb-4">Rolni taxrirlash</h2>
            <form action="{{ route('roles.update', $role->id) }}" method="POST" >
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nomi</label>
                    <input value="{{$role->name ?? ''}}" type="text" class="form-control" id="name" name="name" placeholder="Rol nomi" required>
                </div>
                <button type="submit" class="btn btn-primary w-10">Saqlash</button>
            </form>
        </div>
    </main>
@endsection
