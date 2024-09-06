@extends('layout.main')
@section('content')

    <body>
        <div class="py-2 mb-4">
            <h1>Chefs</h1>
            <!-- Breadcrumb -->
            <nav class="d-flex">
                <h6 class="mb-0">
                    <a href="" class="text-reset">Beranda</a>
                    <span>/</span>
                    <a href="" class="text-reset">Cake Varian</a>
                    <span>/</span>
                    <a href="" class="text-reset text-muted"><u>Edit Cake Varian</u></a>
                </h6>
            </nav>
            <!-- Breadcrumb -->
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('cake-varian.update', $cakevarians->id) }}" method="POST">
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
                                        <label class="form-label" for="cake_id">Cake</label>
                                        <span class="text-danger">*</span></label>
                                        <select id="cake_id" name="cake_id" class="form-control">
                                            <option value="" disabled>Select Cake</option>
                                            @foreach ($cakes as $cake)
                                                <option value="{{ $cake->id }}"
                                                    {{ old('cake_id', $cakevarians->cake_id) == $cake->id ? 'selected' : '' }}>
                                                    {{ $cake->cake_name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('cake_id')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label" for="varian_id">Varian</label>
                                        <span class="text-danger">*</span></label>
                                        <select id="varian_id" name="varian_id" class="form-control">
                                            <option value="" disabled>Select Varian</option>
                                            @foreach ($varians as $varian)
                                                <option value="{{ $varian->id }}"
                                                    {{ old('varian_id', $cakevarians->varian_id) == $varian->id ? 'selected' : '' }}>
                                                    {{ $varian->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('varian_id')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
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
