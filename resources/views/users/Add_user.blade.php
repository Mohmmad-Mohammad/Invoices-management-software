@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@section('title')
  {{ trans('invoices.AddUser') }}
@stop


@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('invoices.Users') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('invoices.AddUser') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">


        <div class="col-lg-12 col-md-12">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>خطا</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}">{{ trans('invoices.Back') }}</a>
                        </div>
                    </div><br>
                    <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                          action="{{route('users.store','test')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="">

                            <div class="row mg-b-20">
                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label>{{ trans('invoices.NameUser') }}: <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm mg-b-20"
                                           data-parsley-class-handler="#lnWrapper" name="name" required="" type="text">
                                </div>

                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label>{{ trans('invoices.Email') }}: <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm mg-b-20"
                                           data-parsley-class-handler="#lnWrapper" name="email" required="" type="email">
                                </div>
                            </div>




                            {{-- <div class="card card-statistics">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile"
                                           name="photo" required>
                                                <input type="hidden" id="photo" name="photo"
                                                       >
                                                <label class="custom-file-label"  for="photo">حدد
                                                    الصورة</label>
                                            </div><br><br>

                                    </div> --}}


                        </div>

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>{{ trans('invoices.Password') }} : <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="password" required="" type="password">
                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>{{ trans('invoices.ConfirmPassword') }} : <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="confirm-password" required="" type="password">
                            </div>
                        </div>

                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-6">
                                <label class="form-label">{{ trans('invoices.StatusUser') }}</label>
                                <select name="status" id="select-beast" class="form-control  nice-select  custom-select">
                                    <option value="1">{{ trans('invoices.Active') }}</option>
                                    <option value="0">{{ trans('invoices.NotActive') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mg-b-20">
                            <div class="col-xs-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label"> {{ trans('invoices.RolesUser') }}</label>
                                    {!! Form::select('roles_name[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-main-primary pd-x-20" type="submit">{{ trans('invoices.submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')


    <!-- Internal Nice-select js-->
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

    <!--Internal  Parsley.min js -->
    <script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{URL::asset('assets/js/form-validation.js')}}"></script>

    <script>

$(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
