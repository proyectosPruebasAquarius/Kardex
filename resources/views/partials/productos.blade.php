@extends('index')


@section('title','Listado de Productos - Kardex')


@section('main-content')
<div>
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Productos</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item">Productos</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">

        <div class="col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Lista de Productos</h4>
                    <div class="col-12 d-flex justify-content-end mt-3">


                        <!-- Button trigger modal -->
                        @livewire('productos')
                        <button type="button" class="btn  btn-primary" data-toggle="modal"
                            data-target="#productoModal">Agregar <span class="pc-micon"><i
                                    class="material-icons-two-tone text-white">add</i></span></button>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table" id="table_id">
                        <thead>
                            <tr>
                                <th scope="col" class="text-start">Codigo del Producto</th>
                                <th scope="col" class="text-start">Nombre</th>
                                <th scope="col" class="text-start">Marca</th>
                                <th scope="col" class="text-start">Categoria</th>
                                <th scope="col" class="text-start">Proveedor</th>
                                <th scope="col" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach ($productos as $p)
                            <tr>
                                <td class="text-start">{{ $p->cod_producto }}</td>
                                <td class="text-start">{{ $p->producto }}</td>
                                <td class="text-start">{{ $p->nombre_marca }}</td>
                                <td class="text-start">{{ $p->nombre_categoria }}</td>
                                <td class="text-start">{{ $p->nombre_proveedor }}</td>
                                <td class="text-center">
                                    <a type="button" data-toggle="modal" data-target="#productoModal"
                                        onclick="Livewire.emit('asignProducto',@js($p) )"><i
                                            class="icon feather icon-edit f-16 text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></i></a>
                                    <a type="button" onclick="trash(@js($p->id_producto))"><i class="feather icon-trash-2 ml-3 f-16 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

<script>
    let trash = (id) => {
        Swal.fire({
            title: '¿Estás seguro que deseas eliminar este dato?',
            text: "¡Está acción es irreversible!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrar',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('dropByStateProducto', id)
            }
        })
    }
</script>
@endpush

@push('datatable-scripts')
<script>
    $(document).ready( function () {
       
                $('#table_id').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                },
               
            });
            

    



} );


</script>

@endpush

@push('partial-style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
@endpush