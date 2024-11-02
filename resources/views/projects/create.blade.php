@extends('layout.main')
@section('title', 'Project Add')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="container mt-5">
            <h2 class="text-center mb-4">Loyihani Yaratish</h2>
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Loyiha Nomi</label>
                    <input type="text" class="form-control" id="name" name="title" placeholder="Loyiha nomini kiriting"
                           required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Tavsif</label>
                    <textarea class="form-control" id="description" name="description" rows="3"
                              placeholder="Loyihaning tavsifini kiriting"></textarea>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Loyiha Statusi</label>
                    <select class="form-select" id="status" name="completed" required>
                        <option value="">Statusni tanlang</option>
                        <option value="1">Faol</option>
                        <option value="0">Faol emas</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="users" class="form-label">Foydalanuvchilarni tanlang</label>
                    <select multiple class="form-select" id="users" name="users[]" required>
                        <option value="">Foydalanuvchilarni tanlang</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-10">Yaratish</button>
            </form>
        </div>
    </main>
@endsection
