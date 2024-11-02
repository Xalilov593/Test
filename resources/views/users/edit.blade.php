@extends('layout.main')
@section('title', 'Edit')
@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">



        <div class="container mt-5">
            <h2 class="text-center mb-4">Foydalanuvchini taxrirlash</h2>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Foydalanuvchi nomi</label>
                    <input value="{{$user->name ?? ''}}" type="text" class="form-control" id="username" name="name" placeholder="Ism kiriting" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{$user->email ?? ''}}" type="email" class="form-control" id="email" name="email" placeholder="Email kiriting" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Parol</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Parol kiriting" required>
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Parolni tasdiqlash</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Parolni qayta kiriting" required>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Rol tanlang</label>
                    <select class="form-select" id="role" name="role_id" required>
                        <option value="">Rolni tanlang</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">Yaratish</button>
            </form>
        </div>
    </main>
@endsection
