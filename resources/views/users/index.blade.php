@extends('layout.main')
@section('title', 'Dashboard')
@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Foydalanuvchilar</h1>
            <a class="btn btn-primary" href="{{route('users.create')}}">Yaratish</a>

        </div>

        <p>Bu sahifada foydalanuvchilar ro'yxati ko'rsatilgan:</p>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Ism</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Amallar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user=>$value)
                    <tr>
                        <td>{{++$user}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td><span class="badge bg-success"> {{$value->getRoleNames()->first() ?? 'Roli yo\'q'}}</span></td>
                        <td>
                            <a href="{{route('users.edit', $value->id)}}" class="btn btn-sm btn-warning d-inline">Tahrirlash</a>
                            @if($value->getRoleNames()->first()!='Super-admin')
                            <form action="{{route('users.destroy', $value->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">O'chirish</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </main>
@endsection
