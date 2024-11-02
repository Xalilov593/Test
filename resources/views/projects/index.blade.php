@extends('layout.main')
@section('title', 'Dashboard')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <h1 class="mb-4">Loyihalar ro'yxati</h1>

        <div class="row mb-3">
            <form action="{{ route('projects.index') }}" method="GET" class="d-flex align-items-center">
                <div class="me-2">
                    <input type="text" class="form-control" placeholder="Qidirish..." name="search" value="{{ request('search') }}">
                </div>
                <div class="me-2">
                    <select class="form-select" name="filter">
                        <option value="">Barchasi</option>
                        <option value="active" {{ request('filter') === 'active' ? 'selected' : '' }}>Faol</option>
                        <option value="inactive" {{ request('filter') === 'inactive' ? 'selected' : '' }}>Nofaol</option>
                    </select>
                </div>
                <div class="me-2">
                    <button type="submit" class="btn btn-primary">Qidirish</button>
                </div>
                <div>
                    <a class="btn btn-primary" href="{{ route('projects.create') }}">Loyiha qo'shish</a>
                </div>
            </form>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Ism</th>
                <th>Tavsifi</th>
                <th>Status</th>
                <th>Bajaruvchilar</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody id="tableBody">
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    @if($project->completed==1)
                        <td><span class="badge bg-secondary">Faol</span></td>
                    @else
                        <td><span class="badge bg-secondary">Nofaol</span></td>
                    @endif
                        <td>
                            @foreach($project->users as $user)
                            {{ $user->name}}
                            @endforeach
                        </td>
                    <td>
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Tahrirlash</a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">O'chirish</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </main>
@endsection

