@extends('layouts.master')
@section('title')
{{ trans('invoices.Sections') }}
@endsection
@section('css')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('invoices.Settings') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('invoices.Sections') }}</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!--alerts -->
    @error('section_name')
    <div class="row mr-2 ml-2" >
        <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                id="type-error">{{Session::get('error')}}
            <span class="">{{$message}}</span>
        </button>
    </div>
    @enderror

    @error('description')
    <div class="row mr-2 ml-2" >
        <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                id="type-error">{{Session::get('error')}}
            <span class="">{{$message}}</span>
        </button>
    </div>
    @enderror
    @include('alerts.error')
    @include('alerts.delete')
    @include('alerts.Add')

    <div class="row">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    @can('Permission.AddSection')
                    <div class="col-sm-4 col-md-4 col-xl-3 mg-t-20">
                        <a class="modal-effect btn btn-outline-success btn-block" data-effect="effect-sign" data-toggle="modal" href="#modaldemo8">  {{ trans('invoices.AddSection') }} <i
                                class="fas fa-plus"></i></a>
                    </div>
                    @endcan

                    <div class="d-flex justify-content-between">


                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive text-center ">

                        <table id="example1" class="table key-buttons text-md-nowrap " data-page-length="50">

                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">{{ trans('invoices.NameSection') }} </th>
                                <th class="border-bottom-0">{{ trans('invoices.CreatedSection') }}</th>
                                <th class="border-bottom-0">{{ trans('invoices.note') }}</th>
                                <th class="border-bottom-0">{{ trans('invoices.CreatedDate') }}</th>
                                <th class="border-bottom-0">{{ trans('invoices.EditDate') }}</th>
                                <th class="border-bottom-0">{{ trans('invoices.Processes') }}</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $nambur = 0?>
                            @isset($Sections)
                                @foreach($Sections as $Section)
                                    <?php $nambur++ ?>
                            <tr>
                                <td>{{$nambur}}</td>
                                <td>{{$Section -> section_name}}</td>
                                <td>{{$Section -> created_by}}</td>
                                <td>{{$Section -> description}}</td>
                                <td>{{$Section -> Created_at}}</td>
                                <td>{{$Section -> updated_at}}</td>
                                    <td>
                                        <div class="btn-group" role="group"
                                                  aria-label="Basic example">
                                            @can('Permission.EditSection')
                                            <a data-id="{{$Section -> id}}" data-section_name="{{$Section -> section_name}}" data-description="{{$Section -> description}}"
                                               data-effect="effect-sign" data-toggle="modal" href="#modaldemo4"

                                               class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{ trans('invoices.Edit') }} <i class="las la-pen"></i></a>
                                            @endcan
                                            @can('Permission.DeleteSection')

                                            <a data-id="{{$Section -> id}}" data-section_name="{{$Section -> section_name}}" data-toggle="modal" href="#modaldemo5"
                                               class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{ trans('invoices.Delete') }} <i class="las la-trash"></i></a>
                                                @endcan

{{--                                            <a href=""--}}
{{--                                               class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">ارشفة</a>--}}


                                        </div>
                                    </td>

                            </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div>
                    <div class="modal" id="modaldemo8">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">{{ trans('invoices.AddSection') }}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('Sections.store') }}" method="post">
                                       @csrf

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">{{ trans('invoices.NameSection') }}</label>
                                            <input type="text" class="form-control" id="section_name" name="section_name">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">{{ trans('invoices.note') }}</label>
                                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('invoices.cancel') }}</button>
                                            <button type="submit" class="btn btn-success">{{ trans('invoices.submit') }}</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal" id="modaldemo4">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">{{ trans('invoices.EditSection') }}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('Sections/update') }}" method="POST">
                                        @method('patch')
                                        @csrf
                                        <input type="text" class="form-control"  value="" id="id" name="id" hidden>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">{{ trans('invoices.Section') }}</label>
                                            <input type="text" class="form-control"  value="" id="section_name" name="section_name">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">{{ trans('invoices.note') }}</label>
                                            <textarea class="form-control" id="description"   name="description" rows="3"></textarea>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('invoices.cancel') }}</button>
                                            <button type="submit" class="btn btn-success">{{ trans('invoices.submit') }}</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal" id="modaldemo5">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">{{ trans('invoices.DeleteSection') }}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('Sections.destroy') }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <div class="modal-body">
                                            <p> {{ trans('invoices.SuccessDelete') }} ?</p><br>
                                        <input type="text" class="form-control"  value="" id="id" name="id" hidden>
                                        <input type="text" class="form-control"  value=""  id="section_name" name="section_name" readonly>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> {{ trans('invoices.cancel') }} </button>
                                            <button type="submit" class="btn btn-danger"> {{ trans('invoices.submit') }} </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!--/div-->

        <!--div-->
    </div>
    </div>
    </div>

    <!-- Container closed -->

    <!-- main-content closed -->
@endsection

@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->

    <script src="{{URL::asset('assets/js/table-data.js')}}"></script><!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Internal Modal js-->

    <script>
        $('#modaldemo5').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var section_name = button.data('section_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #section_name').val(section_name);
        })
    </script>
    <script>
    $('#modaldemo4').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var section_name = button.data('section_name')
    var description = button.data('description')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #section_name').val(section_name);
    modal.find('.modal-body #description').val(description);
    })
    </script>
@endsection
