<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Pragma" content="no-cache">
    <title>CRUD Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="/css/style.css">


</head>
<body style="background: rgb(255, 221, 149)">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Patisserie</h3>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('cakes.create') }}" class="btn btn-md btn-brown mb-3">ADD MENU</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($cakes as $cake)
                                <tr>
                                    <td>{{ $cake->cake_name }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/'.$cake->image) }}" class="rounded" style="width: 150px">

                                    </td>                                    
                                    <td>Rp {{ number_format($cake->price, 0, ',', '.') }}</td>
                                    <td>{{$cake->cake_description}}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('cakes.destroy', $cake->id) }}" method="POST">
                                            <a href="{{ route('cakes.edit', $cake->id) }}" class="btn btn-sm btn-warning">EDIT</a>
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            @if(session()->has('success'))
                toastr.success('{{ session('success') }}', 'SUCCESS!');
            @elseif(session()->has('error'))
                toastr.error('{{ session('error') }}', 'FAILED!');
            @endif
        });
    </script>

</body>
</html>