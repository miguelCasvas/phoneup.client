@extends('layouts.blank')

@push('stylesheets')
    <!-- bootstrap-datetimepicker -->
    <link href="{{ asset("vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css") }}">
@endpush

@push('scripts')
    <!-- bootstrap-datetimepicker -->
    <script src="{{ asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
@endpush


@section('main_container')
    <!-- page content -->
    <div class="right_col" role="main" style="min-height: 800px;">

        <ol class="breadcrumb">
            <li><a href="{{url('miperfil')}}">{{trans('menus.usuario.infoPersonal')}}</a></li>
            <li><a href="#">{{trans('menus.usuario.permisos')}}</a></li>
            <li class="active">{{trans('menus.usuario.otros')}}</li>
        </ol>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{trans('menus.usuario.infoPersonal')}} <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right">
                            <a class="collapse-link"><i class="fa fa-chevron-up"></i><span id="transmark" style="display: none; width: 0px; height: 0px;"></span></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block;">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">{{trans('usuario.nombres')}} <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="first-name" required="required" class="form-control col-md-7 col-xs-12" type="text" value="{{$datosUsuario->nombres}}" name="nombres">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">{{trans('usuario.apellidos')}} <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" type="text" value="{{$datosUsuario->apellidos}}" name="apellidos">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">{{trans('usuario.identificacion')}} <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" type="text" value="{{$datosUsuario->identificacion}}" name="identificacion">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">{{trans('usuario.fechaNacimiento')}} <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" type="text" value="{{$datosUsuario->fecha_nacimiento}}" name="fechaNacimiento">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="button">{{trans('usuario.btnActualizar')}}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection