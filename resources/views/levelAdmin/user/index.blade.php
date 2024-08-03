@extends('dashboard.dashboardApp')
@section('content')
<div class="section-header">
    <h1>User</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>
<div class="section-body">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.pengguna.create') }}" class="btn btn-md btn-success mb-3"><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Level</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user as $index => $pengguna)
                    <tr>
                        <td class="text-center">
                            {{ ++$index }}
                        </td>
                        <td>{{ $pengguna->username }}</td>
                        <td>{{ $pengguna->email }}</td>
                        <td>{{ $pengguna->level }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admin.pengguna.destroy', $pengguna->id) }}" method="POST">
                                <a href="{{ route('admin.pengguna.show', $pengguna->id) }}" class="btn btn-sm btn-dark"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.pengguna.edit', $pengguna->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">
                        Data User Belum Ada.
                    </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection