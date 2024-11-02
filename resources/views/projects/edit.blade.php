@extends('layout.main')
@section('title', 'Project Edit')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="container mt-5">
            <h2 class="text-center mb-4">Loyihani Taxrirlash</h2>
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Loyiha Nomi</label>
                    <input type="text" value="{{$project->title ?? ''}}" class="form-control" id="name" name="title" placeholder="Loyiha nomini kiriting"
                           required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Tavsif</label>
                    <textarea  class="form-control" id="description" name="description" rows="3"
                              placeholder="Loyihaning tavsifini kiriting"> {{ old('description', $project->description) }}  </textarea>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Loyiha Statusi</label>
                    <select class="form-select" id="status" name="completed" required>
                        <option value="">Statusni tanlang</option>
                        <option value="1" {{ (old('completed', $project->completed) == 1) ? 'selected' : '' }}>Faol</option>
                        <option value="0" {{ (old('completed', $project->completed) == 0) ? 'selected' : '' }}>Faol emas</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="users" class="form-label">Foydalanuvchilarni tanlang</label>
                    <select multiple class="form-select" id="users" name="users[]" required>
                        <option value="">Foydalanuvchilarni tanlang</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}"
                                {{ (in_array($user->id, old('users', $project->users->pluck('id')->toArray())) ? 'selected' : '') }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-10">Yaratish</button>
            </form>
        </div>
    </main>
@endsection
