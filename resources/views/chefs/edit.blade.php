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
                    <a href="" class="text-reset">Chefs</a>
                    <span>/</span>
                    <a href="" class="text-reset text-muted"><u>Edit Chef</u></a>
                </h6>
            </nav>
            <!-- Breadcrumb -->
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('chefs.update', $chef->id) }}" method="POST">
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
                                        <input type="text" class="form-control @error('chef_name') is-invalid @enderror"
                                            name="chef_name" value="{{ old('chef_name', $chef->chef_name) }}"
                                            placeholder="Enter chef name">
                                        @error('chef_name')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="specialty">Specialty
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select id="specialty" name="specialty" class="form-control @error('specialty') is-invalid @enderror">
                                            <option value="" disabled>Select Specialty</option>
                                            <option value="Pastry Chef"
                                                {{ old('specialty', $chef->specialty) == 'Pastry Chef' ? 'selected' : '' }}>
                                                Pastry Chef
                                            </option>
                                            <option value="Cake Decorator"
                                                {{ old('specialty', $chef->specialty) == 'Cake Decorator' ? 'selected' : '' }}>
                                                Cake Decorator
                                            </option>
                                            <option value="Chocolatier"
                                                {{ old('specialty', $chef->specialty) == 'Chocolatier' ? 'selected' : '' }}>
                                                Chocolatier
                                            </option>
                                        </select>
                                        @error('specialty')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="experience">Experience
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control @error('experience') is-invalid @enderror"
                                            name="experience" value="{{ old('experience', $chef->experience) }}"
                                            placeholder="Enter year">
                                        @error('experience')
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
