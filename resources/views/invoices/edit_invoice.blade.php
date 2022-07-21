@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
{{ trans('invoices.EditInvoices')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('invoices.Invoices')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('invoices.EditInvoices')}}  </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')

{{--    @if (session()->has('Add'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('Add') }}</strong>--}}
{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}
    @include('alerts.error')
    @include('alerts.delete')
    @include('alerts.Add')
    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('invoices/update') }}" method="post" enctype="multipart/form-data"
                          autocomplete="off">
                        {{ method_field('patch') }}
                        @csrf
                        {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">{{ trans('invoices.InvoicesNumber')}}</label>
                                <input type="hidden" name="invoice_id" value="{{ $Invoices->id }}">
                                <input type="text" class="form-control" id="inputName" name="invoice_number"
                                       title="{{ trans('invoices.PleaseEnter')}}" value="{{$Invoices -> invoice_number}}">
                            </div>

                            <div class="col">
                                <label>{{ trans('invoices.InvoicesNumberTime')}}</label>
                                <input class="form-control fc-datepicker" name="invoice_Date" placeholder="YYYY-MM-DD"
                                       type="text" value="{{$Invoices -> invoice_Date}}" required>
                            </div>

                            <div class="col">
                                <label>{{ trans('invoices.InvoicesNumberPaidBills')}}</label>
                                <input class="form-control fc-datepicker" name="Due_date" placeholder="YYYY-MM-DD"
                                       type="text" required value="{{$Invoices -> Due_date}}">
                            </div>

                        </div>

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">{{ trans('invoices.Sections')}}</label>
                                <select name="Section" class="form-control " onclick="console.log($(this).val())"
                                        onchange="console.log('change is firing')">
                                    <!--placeholder-->
                                    <option value=" {{ $Invoices->section->id }}">
                                        {{$Invoices -> section-> section_name}}
                                    </option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}"> {{ $section->section_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">{{ trans('invoices.Products')}}</label>
                                <select id="product" name="product" class="form-control">
                                    <option value=" {{ $Invoices->product }}">
                                        {{ $Invoices->product }}
                                    </option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">{{ trans('invoices.AmountCollection')}}</label>
                                <input type="text" class="form-control"  value="{{ $Invoices->Amount_collection }}" id="inputName" name="Amount_collection"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                        </div>


                        {{-- 3 --}}

                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label">{{ trans('invoices.AmountCommission')}}</label>
                                <input type="text" value="{{ $Invoices->Amount_Commission }}" class="form-control form-control-lg" id="Amount_Commission"
                                       name="Amount_Commission" title="{{ trans('invoices.PleaseAmountCommission')}}"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                       required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">{{ trans('invoices.Discount')}}</label>
                                <input type="text" value="{{ $Invoices->Discount }}" class="form-control form-control-lg" id="Discount" name="Discount"
                                       title="{{ trans('invoices.PleaseDiscount')}} "
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                       value=0 required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">{{ trans('invoices.Rate_VAT')}}</label>
                                <select name="Rate_VAT"  id="Rate_VAT" class="form-control" onchange="myFunction()">
                                    <!--placeholder-->{{ $Invoices->Rate_VAT }}
                                    <option value="{{ $Invoices->Rate_VAT }}" >{{ $Invoices->Rate_VAT }}</option>
                                    <option value="5%">5%</option>
                                    <option value="15%">15%</option>
                                    <option value="20%">20%</option>
                                    <option value="25%">25%</option>
                                    <option value="30%">30%</option>
                                    <option value="35%">35%</option>
                                    <option value="40%">40%</option>
                                    <option value="45%">45%</option>
                                    <option value="50%">50%</option>
                                </select>
                            </div>

                        </div>

                        {{-- 4 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">{{ trans('invoices.Value_Status')}}</label>
                                <input type="text" value="{{ $Invoices->Value_VAT }}" class="form-control" id="Value_VAT" name="Value_VAT" readonly>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">{{ trans('invoices.Total')}}</label>
                                <input type="text" value="{{ $Invoices->Total }}"  class="form-control" id="Total" name="Total" readonly>
                            </div>
                        </div>

                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">{{ trans('invoices.note')}}</label>
                                <textarea class="form-control"  id="exampleTextarea" name="note" rows="3">{{ $Invoices->note }}</textarea>
                            </div>
                        </div><br>


                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">{{ trans('invoices.SaveData')}}</button>
                        </div>


                    </form>
                </div>
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
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>

    <script>
        $(document).ready(function() {
            $('select[name="Sections"]').on('change', function() {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('section') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="product"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="product"]').append(
                                    '' + '<option value="' + value + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>


    <script>
        function myFunction() {
            var Amount_Commission = parseFloat(document.getElementById("Amount_Commission").value);
            var Discount = parseFloat(document.getElementById("Discount").value);
            var Rate_VAT = parseFloat(document.getElementById("Rate_VAT").value);
            var Value_VAT = parseFloat(document.getElementById("Value_VAT").value);
            var Amount_Commission2 = Amount_Commission - Discount;
            if (typeof Amount_Commission === 'undefined' || !Amount_Commission) {
                alert('يرجي ادخال مبلغ العمولة ');
            } else {
                var intResults = Amount_Commission2 * Rate_VAT / 100;
                var intResults2 = parseFloat(intResults + Amount_Commission2);
                sumq = parseFloat(intResults).toFixed(2);
                sumt = parseFloat(intResults2).toFixed(2);
                document.getElementById("Value_VAT").value = sumq;
                document.getElementById("Total").value = sumt;
            }
        }
    </script>


@endsection
