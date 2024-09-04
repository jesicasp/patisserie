@extends('layout.main')
@section('content')
    <div class="row">
        <div class="py-2 mb-4">
            <h1 class="">Chefs</h1>
            <!-- Breadcrumb -->
            <nav class="d-flex">
                <h6 class="mb-0">
                    <a href="" class="text-reset">Home</a>
                    <span>/</span>
                    <a href="" class="text-reset"><u>Chefs</u></a>
                </h6>
            </nav>
            <!-- Breadcrumb -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('chefs.create') }}" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-server" class="table table-hover table-striped nowrap" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Specialty</th>
                                        <th>Experience</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($chefs as $chef)
                                        <tr>
                                            <td>{{ $chef->chef_name }}</td>
                                            <td>{{ $chef->specialty }}</td>
                                            <td>
                                                {{ $chef->experience }} {{ $chef->experience > 1 ? 'years' : 'year' }}
                                            </td>                                            
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('chefs.destroy', $chef->id) }}" method="POST">
                                                    <a href="{{ route('chefs.edit', $chef->id) }}"
                                                        class="btn btn-sm btn-warning">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Chef Not Available.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $chefs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
