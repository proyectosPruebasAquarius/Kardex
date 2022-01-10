@extends('index')


@section('title','Listado de Categorias - Kardex')


@section('main-content')
<div>
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Categorias</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item">Categorias</li>
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
                <h4 class="card-title">Lista de Categorias</h4>
                <div class="col-12 d-flex justify-content-end mt-3">


                    <!-- Button trigger modal -->
                    @livewire('categorias')
                    <button type="button" class="btn  btn-primary" data-toggle="modal"
                        data-target="#categoriaModal">Agregar <span class="pc-micon"><i
                                class="material-icons-two-tone text-white">add</i></span></button>
                </div>
            </div>
            <div class="card-body">

                <table class="table" id="table_id">
                    <thead class="text-center">
                        <tr>
                          
                            <th scope="col">Nombre</th>
                           <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($categorias as $c)
                        <tr>
                            <td>{{ $c->nombre }}</td>
                            <td>
                                <a type="button"  data-toggle="modal"
                                data-target="#categoriaModal" onclick="Livewire.emit('asignCategoria',@js($c) )" ><i class="icon feather icon-edit f-16 text-success"></i></a>
                                <a href="#!"><i class="feather icon-trash-2 ml-3 f-16 text-danger"></i></a>
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

