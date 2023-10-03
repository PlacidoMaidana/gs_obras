@php
    $edit = !is_null($dataTypeContent->getKey());
    $add = is_null($dataTypeContent->getKey());
@endphp

{{-- @extends('voyager::master') --}}
@extends('layouts.voyager2')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.' . ($edit ? 'edit' : 'add')) . ' ' .
    $dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.' . ($edit ? 'edit' : 'add')) . ' ' . $dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form" class="form-edit-add"
                        action="{{ $edit ? route('voyager.' . $dataType->slug . '.update', $dataTypeContent->getKey()) : route('voyager.' . $dataType->slug . '.store') }}"
                        method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if ($edit)
                            {{ method_field('PUT') }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Adding / Editing -->
                            @php
                                $dataTypeRows = $dataType->{$edit ? 'editRows' : 'addRows'};
                            @endphp

                            {{-- @foreach ($dataTypeRows as $row) --}}
                            @for ($i = 0; $i < count($dataTypeRows); $i += 3)
                                <!-- GET THE DISPLAY OPTIONS -->


                                <div class="row">

                                    @php
                                        if ($i >= count($dataTypeRows)) {
                                            break;
                                        }
                                        $row = $dataTypeRows[$i];
                                        $display_options = $row->details->display ?? null;
                                        if ($dataTypeContent->{$row->field . '_' . ($edit ? 'edit' : 'add')}) {
                                            $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field . '_' . ($edit ? 'edit' : 'add')};
                                        }
                                    @endphp
                                    @include('vendor.voyager.items.edit-add-form-group')

                                    @php
                                        if ($i + 1 >= count($dataTypeRows)) {
                                            break;
                                        }
                                        $row = $dataTypeRows[$i + 1];
                                        $display_options = $row->details->display ?? null;
                                        if ($dataTypeContent->{$row->field . '_' . ($edit ? 'edit' : 'add')}) {
                                            $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field . '_' . ($edit ? 'edit' : 'add')};
                                        }
                                    @endphp
                                    @include('vendor.voyager.items.edit-add-form-group')

                                    @php
                                        if ($i + 2 >= count($dataTypeRows)) {
                                            break;
                                        }
                                        $row = $dataTypeRows[$i + 2];
                                        $display_options = $row->details->display ?? null;
                                        if ($dataTypeContent->{$row->field . '_' . ($edit ? 'edit' : 'add')}) {
                                            $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field . '_' . ($edit ? 'edit' : 'add')};
                                        }
                                    @endphp
                                    @include('vendor.voyager.items.edit-add-form-group')

                                </div>
                            @endfor

                        </div><!-- panel-body -->

                        @if ($edit)
                            <!-- Tabla para mostrar las líneas de ítems -->

                            <div class="row">
                                <div class="col-12">
                                    <table class="table" id="Tabla_lineas">
                                        <thead>
                                            <tr>
                                                <th colspan="4">INSUMO</th>
                                                <th colspan="2">CANTIDAD</th>
                                                <th colspan="2">PRECIO</th>
                                                <th colspan="2">TOTAL LINEA</th>
                                                <th colspan="2"></th>

                                                <!-- Otros encabezados de la tabla según tus necesidades -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $contadorLineas = 0; ?>
                                            @foreach ($item->lineasItem as $linea)
                                                <tr id="lineaId_{{ $linea->id }}">
                                                    <td colspan="4">
                                                        <input id="COD_INSUMO_{{ $linea->id }}" type="text"
                                                            name="lineas[{{ $linea->id }}][COD_INSUMO]"
                                                            value="{{ $linea->COD_INSUMO }}" size="5">
                                                        <a href="#" onclick="elejir_insumo({{ $linea->id }})"
                                                            class="btn btn-primary">
                                                            <i class="voyager-search"></i>
                                                        </a> <span id="DESCRIPCION_{{ $linea->id }}"
                                                            class="large">{{ $linea->insumo->DESCRIPCION }}</span>
                                                    </td>
                                                    <td colspan="2">
                                                        <input type="text" name="lineas[{{ $linea->id }}][CANTIDAD]"
                                                            value="{{ $linea->CANTIDAD }}">
                                                    </td>
                                                    <td colspan="2">

                                                        <input type="text" name="lineas[{{ $linea->id }}][PRECIO_UNIT]" value="{{ $linea->insumo->PRECIO_UNIT }}"
                                                            readonly>
                                                    </td>
                                                        
                                                    <td colspan="2">

                                                        <input type="text" name="lineas[{{ $linea->id }}][TOTAL]"
                                                            value="{{ $linea->insumo->PRECIO_UNIT * $linea->CANTIDAD }}"
                                                            readonly>
                                                    </td>
                                                    <td colspan="2">
                                                        <!-- Botones de acción -->
                                                        <!-- Botón de eliminación -->
                                                        <a href="#" class="btn btn-danger"
                                                            onclick="eliminarLinea({{ $linea->id }})">
                                                            <i class="voyager-trash"></i>
                                                        </a>

                                                        <a href="#" class="btn btn-primary" onclick="nueva_linea()">
                                                            <i class="voyager-list-add"></i>
                                                        </a>
                                                        <!-- Aquí puedes agregar los botones de acción ocupando 2 columnas -->
                                                    </td>
                                                    <!-- Otros campos de la línea según tus necesidades -->
                                                </tr>
                                                <?php $contadorLineas++; ?>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div id="descripcion_insumo"></div>
                        @else
                            <h1>ESTO ES UN NUEVO ITEM</h1>
                        @endif

                        @include('vendor.voyager.items.edit-add-modal-insumos')

                        <div class="panel-footer">
                        @section('submit-buttons')
                            <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                        @stop
                        @yield('submit-buttons')
                    </div>
                </form>

                <iframe id="form_target" name="form_target" style="display:none"></iframe>
                <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                    enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                    <input name="image" id="upload_file" type="file"
                        onchange="$('#my_form').submit();this.value='';">
                    <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                    {{ csrf_field() }}
                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-danger" id="confirm_delete_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
            </div>

            <div class="modal-body">
                <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                    data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                <button type="button" class="btn btn-danger"
                    id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Delete File Modal -->
@stop

@section('javascript')
<script>
    var params = {};
    var $file;

    function deleteHandler(tag, isMulti) {
        return function() {
            $file = $(this).siblings(tag);

            params = {
                slug: '{{ $dataType->slug }}',
                filename: $file.data('file-name'),
                id: $file.data('id'),
                field: $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
        };
    }

    $('document').ready(function() {
        $('.toggleswitch').bootstrapToggle();

        //Init datepicker for date fields if data-datepicker attribute defined
        //or if browser does not handle date inputs
        $('.form-group input[type=date]').each(function(idx, elt) {
            if (elt.hasAttribute('data-datepicker')) {
                elt.type = 'text';
                $(elt).datetimepicker($(elt).data('datepicker'));
            } else if (elt.type != 'date') {
                elt.type = 'text';
                $(elt).datetimepicker({
                    format: 'L',
                    extraFormats: ['YYYY-MM-DD']
                }).datetimepicker($(elt).data('datepicker'));
            }
        });

        @if ($isModelTranslatable)
            $('.side-body').multilingual({
                "editing": true
            });
        @endif

        $('.side-body input[data-slug-origin]').each(function(i, el) {
            $(el).slugify();
        });

        $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
        $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
        $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
        $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

        $('#confirm_delete').on('click', function() {
            $.post('{{ route('voyager.' . $dataType->slug . '.media.remove') }}', params, function(
                response) {
                if (response &&
                    response.data &&
                    response.data.status &&
                    response.data.status == 200) {

                    toastr.success(response.data.message);
                    $file.parent().fadeOut(300, function() {
                        $(this).remove();
                    })
                } else {
                    toastr.error("Error removing file.");
                }
            });

            $('#confirm_delete_modal').modal('hide');
        });
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script>
    //variable global para identificar las lineas de item_detalle
    var contadorLineas = 0;

    function nueva_linea() {
        if (contadorLineas == 0) {
            contadorLineas = {{ $contadorLineas }};
        }
        contadorLineas++;

        // Obtén la tabla de líneas de pedido
        var tablaLineasPedido = document.getElementById('Tabla_lineas');

        // Crea una nueva fila en la tabla
        var nuevaFila = tablaLineasPedido.insertRow();

        // Asigna un identificador único a la fila basado en contadorLineas
        var nuevaFilaId = 'lineaId_' + contadorLineas;
        nuevaFila.id = nuevaFilaId;
        nuevaFila.innerHTML = '        <td colspan="4">' +
            '            <input  id="COD_INSUMO_' + contadorLineas + '" type="text" name="lineas[' + contadorLineas +
            '][COD_INSUMO]" value="" size="5">' +
            '            <a href="#"  onclick="elejir_insumo(' + contadorLineas + ')" class="btn btn-primary"> ' +
            '                <i class="voyager-search"></i>' +
            '            </a> <span  id="DESCRIPCION_' + contadorLineas + '" class="large"></span>' +
            '        </td>' +
            '        <td colspan="2">' +
            '            <input  type="text" id="CANTIDAD_' + contadorLineas + '" name="lineas[' + contadorLineas +'][CANTIDAD]" value="">' +
            '        </td>' +
            '        <td colspan="2">' +
            '            <input type="text" id="PRECIO_' + contadorLineas + '" name="lineas[' + contadorLineas +'][PRECIO_UNIT]" value="" >' +
            '        </td>' +
            '        <td colspan="2">' +
            '            <input type="text" id="TOTAL_' + contadorLineas + '" name="lineas[' + contadorLineas +'][TOTAL]" value="" >' +
            '        </td>' +
            '        <td colspan="2">' +
            '            <!-- Botones de acción -->' +
            '             <!-- Botón de eliminación -->' +
            '               <a href="#" class="btn btn-danger" onclick="eliminarLinea(' + contadorLineas + ')">' +
            '                    <i class="voyager-trash"></i>' +
            '                </a>' +
            '            <a href="#" class="btn btn-primary" onclick="nueva_linea()" >' +
            '                <i class="voyager-list-add"></i>' +
            '            </a>' +
            '            <!-- Aquí puedes agregar los botones de acción ocupando 2 columnas -->' +
            '        </td>' +
            '        <!-- Otros campos de la línea según tus necesidades -->';




    }
</script>

<script>
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    //!                        LLENAR LA TABLA DE INSUMOS                            ! 
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    $(document).ready(function() {

        $('#insumosTable').dataTable({
            "serverSide": true,
            "ajax": "{{ url('/insumo_elegir') }}",
            "columns": [{
                    data: 'id',
                    name: 'insumos.id'
                },
                {
                    data: 'FAMILIA',
                    name: 'insumos.FAMILIA'
                },
                {
                    data: 'SUB_FAMILIA',
                    name: 'insumos.SUB_FAMILIA'
                },
                {
                    data: 'DESCRIPCION',
                    name: 'insumos.DESCRIPCION'
                },
                {
                    data: 'UNIDAD',
                    name: 'insumos.UNIDAD'
                },
                {
                    data: 'PRECIO_UNIT',
                    name: 'insumos.PRECIO_UNIT'
                },
                {
                    data: 'FECHA_PRECIO',
                    name: 'insumos.FECHA_PRECIO'
                },
                {
                    data: 'CANTIDAD',
                    name: 'insumos.CANTIDAD'
                },
                {
                    data: 'ACTIVO',
                    name: 'insumos.ACTIVO'
                },
                {
                    data: 'unidad_compra',
                    name: 'insumos.unidad_compra'
                },
                {
                    data: 'seleccionar',
                    name: 'seleccionar'
                },

            ]
        });
    });
</script>

<script>
    var Global_lineaId = 0;

    function elejir_insumo(lineaId) {
        Global_lineaId = lineaId;
        // Actualizar el valor del campo de descripción del insumo específico
        $('#modal_insumo').modal({
            show: true
        });

    }
</script>

<script>
    //+----------------------------------------------------------------------------------------------------------------+
    //|            METODO SELECCIONAR DE LA TABLA MODAL                                                                |
    //+----------------------------------------------------------------------------------------------------------------+

    function selecciona_insumo(id, DESCRIPCION, PRECIO_UNIT) {
        $('#COD_INSUMO_' + Global_lineaId).val(id);
        $('#DESCRIPCION_' + Global_lineaId).html(DESCRIPCION);
        $('#PRECIO_' + Global_lineaId).val(PRECIO_UNIT);

        // Obtén la cantidad como número
        var cantidad = parseFloat($('#CANTIDAD_' + Global_lineaId).val());

        // Verifica si cantidad es un número válido
        if (!isNaN(cantidad)) {
            // Calcula el total y lo muestra en el campo TOTAL
            var total = PRECIO_UNIT * cantidad;
            $('#TOTAL_' + Global_lineaId).val(total);
        } else {
            // Si la cantidad no es un número válido, muestra un mensaje de error o realiza la lógica adecuada.
            alert('La cantidad no es válida');
        }

        
        $('#modal_insumo').modal('hide');

    }
</script>


<script>
    //+----------------------------------------------------------------------------------------------------------------+
    //|            METODO PARA ELIMINAR UNA LINEA DE ITEM                                                                |
    //+----------------------------------------------------------------------------------------------------------------+


    function eliminarLinea(lineaId) {
        // Encuentra la fila con el identificador de línea
        var fila = document.getElementById('lineaId_' + lineaId);

        // Si se encontró la fila, elimínala
        if (fila) {
            fila.parentNode.removeChild(fila);
        }
    }
</script>



@stop
