@extends('layout.main')
@section('title', 'Dashboard')
@section('content')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div class="row mt-5">
                    <div class="col-md-3 mb-4">
                        <div class="card text-white bg-primary shadow">
                            <div class="card-body">
                                <h5 class="card-title">Foydalanuvchilar</h5>
                                <h2>{{$users->count()}}</h2>
                                <p class="card-text">Jami ro'yxatdan o'tgan foydalanuvchilar soni.</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('users.index') }}" class="text-white">Ko'proq ma'lumot</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card text-white bg-success shadow">
                            <div class="card-body">
                                <h5 class="card-title">Loyihalar</h5>
                                <h2>{{$projects->count()}}</h2>
                                <p class="card-text">Jami mavjud loyihalar soni.</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('projects.index') }}" class="text-white">Ko'proq ma'lumot</a>
                            </div>
                        </div>
                    </div>
                    @if(auth()->user()->hasRole('Super-admin'))

                    <div class="col-md-3 mb-4">
                        <div class="card text-white bg-warning shadow">
                            <div class="card-body">
                                <h5 class="card-title">Rollar</h5>
                                <h2>{{$roles->count()}}</h2>
                                <p class="card-text">Tizimdagi rollar soni.</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('roles.index') }}" class="text-white">Ko'proq ma'lumot</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card text-white bg-danger shadow">
                            <div class="card-body">
                                <h5 class="card-title">Ruxsatlar</h5>
                                <h2>{{$permissions->count()}}</h2>
                                <p class="card-text">Turli xil ruxsatlar soni.</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('permissions.index') }}" class="text-white">Ko'proq ma'lumot</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </main>
@endsection

