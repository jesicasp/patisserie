@extends('layout.main')
@section('content')
    <div class="row">
        <div class="py-2 mb-4">
            <h1 class="">Varians</h1>
            <!-- Breadcrumb -->
            <nav class="d-flex">
                <h6 class="mb-0">
                    <a href="" class="text-reset">Home</a>
                    <span>/</span>
                    <a href="" class="text-reset"><u>Varians</u></a>
                </h6>
            </nav>
            <!-- Breadcrumb -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('varians.create') }}" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-server" class="table table-hover table-striped nowrap" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($varians as $varian)
                                        <tr>
                                            <td>{{ $varian->name }}</td>
                                            <td>Rp {{ number_format($varian->price, 0, ',', '.') }}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('varians.destroy', $varian->id) }}" method="POST">
                                                    <a href="{{ route('varians.edit', $varian->id) }}"
                                                        class="btn btn-sm btn-warning">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Varian Not Available.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $varians->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
