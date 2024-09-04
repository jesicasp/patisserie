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
                    <a href="" class="text-reset text-muted"><u>Add Chef</u></a>
                </h6>
            </nav>
            <!-- Breadcrumb -->
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('chefs.store') }}" method="POST"> @csrf

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
                                        <input id="chef_name" name="chef_name" type="text" placeholder="Enter chef name"
                                            class="form-control" value="{{ old('chef_name') }}"
                                            class="form-control @error('chef_name') is-invalid @enderror" />
                                        @error('chef_name')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label" for="specialty">Specialty</label>
                                        <span class="text-danger">*</span></label>
                                        <select id="specialty" name="specialty" class="form-control">
                                            <option value="" disabled selected>Select Specialty</option>
                                            <option value="Pastry Chef"
                                                {{ old('specialty') == 'Pastry Chef' ? 'selected' : '' }}>Pastry Chef
                                            </option>
                                            <option value="Cake Decorator"
                                                {{ old('specialty') == 'Cake Decorator' ? 'selected' : '' }}>Cake Decorator
                                            </option>
                                            <option value="Chocolatier"
                                                {{ old('specialty') == 'Chocolatier' ? 'selected' : '' }}>Chocolatier
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
                                            <span class="text-danger">*</span></label>
                                        <input id="experience" name="experience" type="number" placeholder="Enter year"
                                            class="form-control" value="{{ old('experience') }}"
                                            class="form-control @error('experience') is-invalid @enderror" />

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

    </body>
@endsection
