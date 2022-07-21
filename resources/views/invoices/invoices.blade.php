@extends('layouts.master')
@section('title')
    {{ trans('invoices.BillingList') }}
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">    {{ trans('invoices.Invoices') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('invoices.BillingList') }}  </span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')




    @error('')
    <div class="row mr-2 ml-2" >
        <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                id="type-error">{{Session::get('error')}}
            <span class="">{{$message}}</span>
        </button>
    </div>
    @enderror

    @error('')
    <div class="row mr-2 ml-2" >
        <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                id="type-error">{{Session::get('error')}}
            <span class="">{{$message}}</span>
        </button>
    </div>
    @enderror
    @error('')
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

    <!-- row -->
				<div class="row">
                    <!-- delete_invoices -->
                    @if (session()->has('delete_invoice'))
                        <script>
                            window.onload = function() {
                                notif({
                                    msg: "{{trans('messages.SuccessDelete')}}",
                                    type: "success"
                                })
                            }
                        </script>
                    @endif
                <!-- restore_invoice -->

                    @if (session()->has('restore_invoice'))
                        <script>
                            window.onload = function() {
                                notif({
                                    msg: "{{trans('messages.SuccessRestored')}}",
                                    type: "success"
                                })
                            }
                        </script>
                @endif

                    @if (session()->has('Status_Update'))
                        <script>
                            window.onload = function() {
                                notif({
                                    msg: "{{trans('messages.SuccessUpdate')}}",
                                    type: "success"
                                })
                            }
                        </script>
                @endif

                    @if (session()->has('archive_invoice'))
                        <script>
                            window.onload = function() {
                                notif({
                                    msg: "{{trans('messages.SuccessArchive')}}",
                                    type: "success"
                                })
                            }
                        </script>
                @endif

                        <!--div-->
                        <div class="col-xl-12">
                            <div class="card mg-b-20">
                                <div class="card-header pb-0">
                                    @can('Permission.AddInvoice')
                                    <a href="invoices/create" class="modal-effect btn btn-sm btn-success" style="color:white"><i
                                            class="fas fa-plus"></i>&nbsp; {{ trans('invoices.InvoicesAdd') }}</a>
                                    @endcan
                                    @can('Permission.UpEXCEL')
                                    <a class="modal-effect btn btn-sm btn-primary" href="{{ url('export_invoices') }}"
                                    style="color:white"><i class="fas fa-file-download"></i>&nbsp;{{ trans('invoices.UpEXCEL')}}</a>
                                        @endcan

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table key-buttons text-md-nowrap">
                                            <thead>
                                            <tr>
                                                <th class="border-bottom-0">#</th>
                                                <th class="border-bottom-0">{{ trans('invoices.InvoicesNumber')}}</th>
                                                <th class="border-bottom-0">{{ trans('invoices.InvoicesNumberTime')}}</th>
                                                <th class="border-bottom-0">{{ trans('invoices.InvoicesNumberPaidBills')}}</th>
                                                <th class="border-bottom-0">{{ trans('invoices.Sections')}}</th>
                                                <th class="border-bottom-0">{{ trans('invoices.Products')}}</th>
                                                <th class="border-bottom-0">{{ trans('invoices.AmountCollection')}}</th>
                                                <th class="border-bottom-0">{{ trans('invoices.AmountCommission')}}</th>
                                                <th class="border-bottom-0">{{ trans('invoices.Discount')}}</th>
                                                <th class="border-bottom-0">{{ trans('invoices.Rate_VAT')}}</th>
                                                <th class="border-bottom-0">{{ trans('invoices.note')}}</th>
                                                <th class="border-bottom-0">{{ trans('invoices.Value_VAT')}}</th>
                                                <th class="border-bottom-0">{{ trans('invoices.Value_Status')}}</th>
                                                <th class="border-bottom-0">{{ trans('invoices.Total')}}</th>
                                                <th class="border-bottom-0">{{ trans('invoices.Processes')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            <?php $number = 0?>
                                            @isset($invoices)
                                            @foreach($invoices as $invoice )
                                            <?php $number++ ?>
                                            <tr>
                                                <td>{{$number}}</td>
                                                <td>{{$invoice -> invoice_number}}</td>
                                                <td>{{$invoice -> invoice_Date}}</td>
                                                <td>{{$invoice -> Due_date}}</td>
                                                <td>{{$invoice -> section-> section_name}}</td>
                                                <td>{{$invoice -> product}}</td>
                                                <td>{{$invoice -> Amount_collection}}</td>
                                                <td>{{$invoice -> Amount_Commission}}</td>
                                                <td>{{$invoice -> Discount}}</td>
                                                <td>{{$invoice -> Rate_VAT}}</td>
                                                <td>{{$invoice -> note}}</td>
                                                <td>{{$invoice -> Value_VAT}}</td>
                                                <td>
                                                    @if($invoice ->Value_Status == 1 )
                                                        <span class="text-success">{{$invoice -> Status}}</span>
                                                    @elseif($invoice ->Value_Status == 2)
                                                        <span class="text-danger">{{$invoice -> Status}}</span>
                                                    @else
                                                        <span class="text-warning">{{$invoice -> Status}}</span>
                                                    @endif
                                                </td>
                                                <td>{{$invoice -> Total}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                    <button aria-expanded="false" aria-haspopup="true"
                                                            class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                            type="button">{{ trans('invoices.Processes')}}<i class="fas fa-caret-down ml-1"></i></button>
                                                        <div class="dropdown-menu tx-13">

                                                        <a  style="margin: 2px;" href="{{url('/details',$invoice -> id)}}"
                                                            class="dropdown-item text-success">{{ trans('invoices.details')}} <i class="text-success las la-eye" ></i></a>

                                                        @can('Permission.InvoiceEdit')
                                                        <a  style="margin: 2px;" href="{{route('edit',$invoice -> id)}}"
                                                             class="dropdown-item text-primary"  >{{ trans('invoices.Edit')}} <i class="text-primary las la-pen"></i></a>
                                                        @endcan
                                                        @can('Permission.InvoiceDelete')

                                                        <a  style="margin: 2px;" href="" class="dropdown-item text-danger" data-invoice_id="{{ $invoice->id }}" data-toggle="modal" data-target="#delete_invoice"> حذف <i class="text-danger fas fa-trash-alt"></i>
                                                    @endcan

                                                            @can('Permission.PaymentStatusChange')
                                                                <a class="dropdown-item"
                                                                   href="{{ URL::route('Status_show', [$invoice->id]) }}">    {{ trans('invoices.ChangePaymentStatus') }}
                                                                    <i
                                                                        class=" text-success fas
                                                                        fa-money-bill"></i>&nbsp;&nbsp;
                                                                    </a>
                                                            @endcan
                                                            @can('Permission.ArchiveInvoice')
                                                            <a class="dropdown-item" href="#" data-invoice_id="{{ $invoice->id }}"
                                                               data-toggle="modal" data-target="#Transfer_invoice">{{ trans('invoices.Archived') }}<i
                                                                    class="text-warning fas fa-exchange-alt"> </i>&nbsp;&nbsp;</a>
                                                            @endcan
                                                            @can('Permission.InvoicePrinting')
                                                            <a class="dropdown-item" href="Print_invoice/{{ $invoice->id }}">{{ trans('invoices.Print') }}
                                                                الفاتورة<i
                                                                    class="text-success fas fa-print"></i>&nbsp;&nbsp;
                                                            </a>
                                                            @endcan
                                                    </div>

                                                </td>

                                            </tr>

                                            @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/div-->

                    <!-- حذف الفاتورة -->

                </div>
                </div>
                </div>

				<!-- row closed -->
    <div class="modal fade" id="delete_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('invoices.DeleteInvices') }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('invoices.destroy') }}" method="post">
{{--                    {{ method_field('delete') }}--}}
                    {{csrf_field()}}
                </div>
                <div class="modal-body">
                    {{ trans('invoices.SuccessDelete') }} ?
                    <input type="hidden" name="invoice_id" id="invoice_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('invoices.cancel')}}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('invoices.submit')}}</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Transfer_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('invoices.ArchivedUp') }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('invoices.destroy') }}" method="post">
{{--                    {{ method_field('delete') }}--}}
                    {{ csrf_field() }}
                </div>
                <div class="modal-body">
                     {{ trans('invoices.SuccessArchived') }} ?
                    <input type="hidden" name="invoice_id" id="invoice_id" value="">
                    <input type="hidden" name="id_page" id="id_page" value="2">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('invoices.cancel')}}</button>
                    <button type="submit" class="btn btn-success">{{ trans('invoices.submit')}}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
			<!-- Container closed -->

		<!-- main-content closed -->
@endsection

@section('js')
    <!-- Internal Data tables -->
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
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

    <script>
    $('#delete_invoice').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var invoice_id = button.data('invoice_id')
    var modal = $(this)
    modal.find('.modal-body #invoice_id').val(invoice_id);
    })

    </script>


    <script>
        $('#Transfer_invoice').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var invoice_id = button.data('invoice_id')
            var modal = $(this)
            modal.find('.modal-body #invoice_id').val(invoice_id);
        })
    </script>
@endsection
