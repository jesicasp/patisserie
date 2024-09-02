@extends('layout.main')
@section('content')
    <div class="row">
        <div class="py-2 mb-4">
            <h1 class="">Cakes</h1>
            <!-- Breadcrumb -->
            <nav class="d-flex">
                <h6 class="mb-0">
                    <a href="" class="text-reset">Home</a>
                    <span>/</span>
                    <a href="" class="text-reset"><u>Cakes</u></a>
                </h6>
            </nav>
            <!-- Breadcrumb -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('cakes.create') }}" class="btn btn-primary">Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-server" class="table table-hover table-striped nowrap" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cakes as $cake)
                                        <tr>
                                            <td>{{ $cake->cake_name }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset('storage/' . $cake->image) }}" class="rounded"
                                                    style="width: 150px">

                                            </td>
                                            <td>Rp {{ number_format($cake->price, 0, ',', '.') }}</td>
                                            <td>{{ $cake->cake_description }}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('cakes.destroy', $cake->id) }}" method="POST">
                                                    <a href="{{ route('cakes.edit', $cake->id) }}"
                                                        class="btn btn-sm btn-warning">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Cakes Not Available.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $cakes->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
