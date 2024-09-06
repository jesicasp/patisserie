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
                    <a href="" class="text-reset text-muted"><u>Add Varian</u></a>
                </h6>
            </nav>
            <!-- Breadcrumb -->
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('varians.store') }}" method="POST"> @csrf

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
                                            <span class="text-danger">*</span></label>
                                        <input id="name" name="name" type="text" placeholder="Enter varian name"
                                            class="form-control" value="{{ old('name') }}"
                                            class="form-control @error('name') is-invalid @enderror" />
                                        @error('name')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label" for="price">Price
                                            <span class="text-danger">*</span></label>
                                        <input id="price" name="price" type="number" placeholder="Enter price"
                                            class="form-control" value="{{ old('price') }}"
                                            class="form-control @error('price') is-invalid @enderror" />

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
