@extends('layout.main')
@section('content')
    <div class="row">
        <div class="py-2 mb-4">
            <h1 class="">Cake Varian</h1>
            <!-- Breadcrumb -->
            <nav class="d-flex">
                <h6 class="mb-0">
                    <a href="" class="text-reset">Home</a>
                    <span>/</span>
                    <a href="" class="text-reset"><u>Cake Varian</u></a>
                </h6>
            </nav>
            <!-- Breadcrumb -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('cake-varian.create') }}" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">{{ $message }}</div>
                        @endif
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="datatable-server" class="table table-hover table-striped nowrap" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Cake</th>
                                        <th>Varian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cakevarians as $cakevarian)
                                        <tr>
                                            <td>{{ $cakevarian->cake->cake_name }}</td>
                                            <td>{{ $cakevarian->varian->name }}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('cake-varian.destroy', $cakevarian->id) }}"
                                                    method="POST">
                                                    <a href="{{ route('cake-varian.edit', $cakevarian->id) }}"
                                                        class="btn btn-sm btn-warning">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Cake Varian Not Available.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $cakevarians->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
