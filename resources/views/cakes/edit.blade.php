<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Cake</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background:rgb(255, 221, 149)">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div>
                        <h3 class="text-center my-4">Edit Cake Data</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('cakes.update', $cake->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                    
                            <div class="form-group">
                                <label class="font-weight-bold">Name</label>
                                <input type="text" class="form-control @error('cake_name') is-invalid @enderror" name="cake_name" value="{{ old('cake_name',$cake->cake_name) }}"  placeholder="Enter cake name">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Image</label>
                                <img 
                                id="file-preview" 
                                class="img-fluid col-sm-6 mb-3 d-block" 
                                height="100" 
                                src="{{ old('image', $cake->image ? asset('storage/' . $cake->image) : '') }}" 
                                alt="Image Preview">                                
                                <input type="file" id="image" class="form-control" name="image" value="{{ old('image',$cake->image) }}">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Price</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price',$cake->price) }}" placeholder="Enter cake price">
                            
                                @error('price')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Description</label>
                                <textarea class="form-control @error('cake_description') is-invalid @enderror" name="cake_description" rows="4" placeholder="Add cake description">{{ old('cake_description', $cake->cake_description) }}</textarea>
                            
                                @error('cake_description')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
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
    fileReader.onload = function (event) {
                preview.setAttribute('src', event.target.result);
            }
            fileReader.readAsDataURL(file[0]);
        }
    }
    input.addEventListener("change", previewPhoto);
  </script>
</body>
</html>