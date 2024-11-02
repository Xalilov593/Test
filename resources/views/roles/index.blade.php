
@extends('layout.main')
@section('title', 'Role')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Rollar</h1>
            <a class="btn btn-primary" href="{{route('roles.create')}}">Yaratish</a>
        </div>
        <p>Bu sahifada foydalanuvchilar rollari  ko'rsatilgan:</p>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nomi</th>
                    <th>Amallar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role=>$value)
                    <tr>
                        <td>{{++$role}}</td>
                        <td>{{$value->name}}</td>
                        <td>
                            <a href="{{route('roles.edit', $value->id)}}" class="btn btn-sm btn-warning d-inline">Tahrirlash</a>
                            @if($value->name!='Super-admin')
                                <form action="{{route('roles.destroy', $value->id)}}" method="POST" class="d-inline">
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
