@extends('layout.main')
@section('content')

    <body>
        <div class="py-2 mb-4">
            <h1>Cakes</h1>
            <!-- Breadcrumb -->
            <nav class="d-flex">
                <h6 class="mb-0">
                    <a href="" class="text-reset">Beranda</a>
                    <span>/</span>
                    <a href="" class="text-reset">Cakes</a>
                    <span>/</span>
                    <a href="" class="text-reset text-muted"><u>Edit Cakes</u></a>
                </h6>
            </nav>
            <!-- Breadcrumb -->
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('cakes.update', $cake->id) }}" method="POST" enctype="multipart/form-data">
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
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('cake_name') is-invalid @enderror"
                                            name="cake_name" value="{{ old('cake_name', $cake->cake_name) }}"
                                            placeholder="Enter cake name">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label" for="code">Image
                                            <span class="text-danger">*</span></label>
                                        <img id="file-preview" class="img-fluid col-sm-6 mb-3 d-block" height="100"
                                            src="{{ old('image', $cake->image ? asset('storage/' . $cake->image) : '') }}"
                                            alt="Image Preview">
                                        <input type="file" id="image" class="form-control" name="image"
                                            value="{{ old('image', $cake->image) }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label" for="degree">Price</label>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                                            name="price" value="{{ old('price', $cake->price) }}"
                                            placeholder="Enter cake price">

                                        @error('price')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label" for="description">Description
                                            <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('cake_description') is-invalid @enderror" name="cake_description" rows="4"
                                            placeholder="Add cake description">{{ old('cake_description', $cake->cake_description) }}</textarea>

                                        @error('cake_description')
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
        <script>
            const input = document.getElementById('image');
            const previewPhoto = () => {
                const file = input.files;
                if (file) {
                    const fileReader = new FileReader();
                    const preview = document.getElementById('file-preview');
                    fileReader.onload = function(event) {
                        preview.setAttribute('src', event.target.result);
                    }
                    fileReader.readAsDataURL(file[0]);
                }
            }
            input.addEventListener("change", previewPhoto);
        </script>
    </body>
@endsection
