@extends('layout.main')
@section('content')

    <body>
        <div class="py-2 mb-4">
            <h1>Varians</h1>
            <!-- Breadcrumb -->
            <nav class="d-flex">
                <h6 class="mb-0">
                    <a href="" class="text-reset">Beranda</a>
                    <span>/</span>
                    <a href="" class="text-reset">Varians</a>
                    <span>/</span>
                    <a href="" class="text-reset text-muted"><u>Edit Varian</u></a>
                </h6>
            </nav>
            <!-- Breadcrumb -->
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('varians.update', $varian->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card">
                        <div class="card-header">
                            <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-secondary">
                                <i class="fa fa-chevron-left"></i>
                                <span>Back</span>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="name">Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name', $varian->name) }}"
                                            placeholder="Enter varian name">
                                        @error('name')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="price">Price</label>
                                        <span class="text-danger">*</span>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                                            name="price" value="{{ old('price', $varian->price) }}"
                                            placeholder="Enter varian price">

                                        @error('price')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    

                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
        
    </body>
@endsection
