	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<center><h1>Consumo de Api</h1></center>
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card radius-10">
            <div class="card-body">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Crear Cliente
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('cliente.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group mt-3">
                                                <label>Nombre</label>
                                                <input type="text" name="name" id="name" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group mt-3">
                                                <label>E-mail</label>
                                                <input type="email" name="email" id="email" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group mt-3">
                                                <label>Telefono</label>
                                                <input type="text" name="phone" id="phone" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group mt-3">
                                                <label>Dirección</label>
                                                <input type="text" name="address" id="address" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="cad-body">
            <div class="tableresponsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefono</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $cliente)
                        <tr>
                            <td>{{ $cliente['name']}}</td>
                            <td>{{ $cliente['email']}}</td>
                            <td>{{ $cliente['phone']}}</td>
                            <td>
                                <div class="btn-group dropstart">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Opciones
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#UpdateModal{{$cliente['id']}}">Actualizar</a>
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#EliminarCliente{{$cliente['id']}}">Eliminar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @foreach($data as $cliente)
    <!-- Modal update -->
                <div class="modal fade" id="UpdateModal{{ $cliente['id'] }}" tabindex="-1" aria-labelledby="UpdateModalLabel{{ $cliente['id']}}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="UpdateModalLabel{{ $cliente['id'] }}">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('cliente.update') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group mt-3">
                                                <input type="hidden" name="id" value="{{ $cliente['id']}}">
                                                <label>Nombre</label>
                                                <input type="text" name="name" id="name" class="form-control" value="{{ $cliente['name']}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group mt-3">
                                                <label>E-mail</label>
                                                <input type="email" name="email" id="email" class="form-control" value="{{ $cliente['email']}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group mt-3">
                                                <label>Telefono</label>
                                                <input type="text" name="phone" id="phone" class="form-control" value="{{ $cliente['phone']}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group mt-3">
                                                <label>Dirección</label>
                                                <input type="text" name="address" id="address" class="form-control" value="{{ $cliente['address']}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal para eliminar -->
                <div class="modal fade" id="EliminarCliente{{$cliente['id']}}" tabindex="-1" aria-labelledby="EliminarCliente{{$cliente['id']}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #0C1427; color:white;">
                                <h5 class="modal-title col-12 text-center" id="EliminarCliente{{$cliente['id']}}Label">Eliminar producto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="DELETE" action="{{route('cliente.delete', $cliente['id'])}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$cliente['id']}}">
                                    <center>
                                        <p>¿Estas seguro que deseas eliminar este cliente <b>{{$cliente['name']}}</b>?</p>
                                    </center>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-secondary" style="width: 100%;" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-danger" style="width: 100%;">Eliminar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
     @endforeach
</div>





