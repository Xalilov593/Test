
@extends('layout.main')
@section('title', 'Permissions')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Ruxsatlar</h1>
            <a class="btn btn-primary" href="{{route('permissions.create')}}">Yaratish</a>
        </div>

        <p>Bu sahifada foydalanuvchilar ruxsatlari  ko'rsatilgan:</p>
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
               @foreach($permissions as $permission=>$value)
                   <tr>
                       <td>{{++$permission}}</td>
                       <td>{{$value->name}}</td>
                       <td>
                           <a href="{{route('permissions.edit', $value->id)}}" class="btn btn-sm btn-warning d-inline">Tahrirlash</a>
                           <form action="{{route('permissions.destroy', $value->id)}}" method="POST" class="d-inline">
                               @csrf
                               @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">O'chirish</button>
                           </form>
                       </td>
                   </tr>
               @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
