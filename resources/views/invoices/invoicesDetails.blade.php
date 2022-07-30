@extends('layouts.master')
@section('title')
{{ trans('invoices.InvoicesDetails') }}
@stop
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
							<h4 class="content-title mb-0 my-auto">{{ trans('invoices.Invoices') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('invoices.InvoicesDetails') }}  </span>
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
    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">{{ trans('invoices.InvoicesDetails') }}
                                                    </a></li>
                                            <li><a href="#tab5" class="nav-link" data-toggle="tab">{{ trans('invoices.PaymentStatus') }}</a></li>
                                            <li><a href="#tab6" class="nav-link" data-toggle="tab">{{ trans('invoices.attachments') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">


                                        <div class="tab-pane active" id="tab4">
                                            <div class="table-responsive mt-15">

                                                <table class="table table-striped" style="text-align:center">
                                                    <tbody>
                                                    <tr>
                                                        <th class="border-bottom-0">{{ trans('invoices.Invoices')}}</th>
                                                        <th class="border-bottom-0">{{ trans('invoices.InvoicesNumberTime')}} </th>
                                                        <th class="border-bottom-0">{{ trans('invoices.InvoicesNumberPaidBills')}}</th>
                                                        <th class="border-bottom-0">{{ trans('invoices.Sections')}}</th>
                                                        <th class="border-bottom-0">{{ trans('invoices.Products')}}</th>
                                                        <th class="border-bottom-0">{{ trans('invoices.AmountCollection')}}</th>
                                                        <th class="border-bottom-0">{{ trans('invoices.AmountCommission')}}</th>
                                                        <th class="border-bottom-0">{{ trans('invoices.Discount')}}</th>
                                                        <th class="border-bottom-0">{{ trans('invoices.Rate_VAT')}}</th>
                                                        <th class="border-bottom-0">{{ trans('invoices.Value_VAT')}}</th>
                                                        <th class="border-bottom-0">{{ trans('invoices.Total')}}</th>
                                                        <th class="border-bottom-0">{{ trans('invoices.Value_Status')}}</th>
                                                        <th class="border-bottom-0">{{ trans('invoices.note')}}</th>
                                                    </tr>

                                                    <tr>
                                                        <td>{{ $invoices ->invoice_number }}</td>
                                                        <td>{{ $invoices->invoice_Date }}</td>
                                                        <td>{{ $invoices->due_date }}</td>
                                                        <td>{{ $invoices->Section->section_name }}</td>
                                                        <td>{{ $invoices->product }}</td>
                                                        <td>{{ $invoices->amount_collection }}</td>
                                                        <td>{{ $invoices->amount_Commission }}</td>
                                                        <td>{{ $invoices->discount }}</td>
                                                        <td>{{ $invoices->rate_VAT }}</td>
                                                        <td>{{ $invoices->value_VAT }}</td>
                                                        <td>{{ $invoices->total }}</td>
                                                        @if ($invoices->value_status == 1)
                                                            <td><span
                                                            class="badge badge-pill badge-success">{{ $invoices->status }}</span>
                                                            </td>
                                                        @elseif($invoices->value_status ==2)
                                                            <td><span
                                                            class="badge badge-pill badge-danger">{{ $invoices->status }}</span>
                                                            </td>
                                                        @else
                                                            <td><span
                                                            class="badge badge-pill badge-warning">{{ $invoices->status }}</span>
                                                            </td>
                                                        @endif
                                                        <td>{{ $invoices->note }}</td>
                                                    </tr>
                                                    <tr>

                                                    </tr>



                                                    <tr>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab5">
                                            <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0 table-hover"
                                                    style="text-align:center">
                                                    <thead>
                                                    <tr class="text-dark">
                                                        <th>#</th>
                                                        <th>{{ trans('invoices.Invoices')}}</th>
                                                        <th>{{ trans('invoices.Products')}}</th>
                                                        <th>{{ trans('invoices.Sections')}}</th>
                                                        <th>{{ trans('invoices.Value_Status')}}</th>
                                                        <th> {{ trans('invoices.PaymentDate')}}</th>
                                                        <th>{{ trans('invoices.note')}}</th>
                                                        <th>{{ trans('invoices.Created_at')}} </th>
                                                        <th>{{ trans('invoices.Usercreate')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 0; ?>
                                                    @foreach ($details as $x)
                                                        <?php $i++; ?>
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $x->invoice_number }}</td>
                                                            <td>{{ $x->product }}</td>
                                                            <td>{{ $invoices->Section->section_name }}</td>
                                                            @if ($x->value_status == 1)
                                                                <td><span
                                                                        class="badge badge-pill badge-success">{{ $x->status }}</span>
                                                                </td>
                                                            @elseif($x->value_status ==2)
                                                                <td><span
                                                                        class="badge badge-pill badge-danger">{{ $x->status }}</span>
                                                                </td>
                                                            @else
                                                                <td><span
                                                                     class="badge badge-pill badge-warning">{{ $x->status }}</span>
                                                                </td>
                                                            @endif
                                                            <td>{{ $x->payment_date }}</td>
                                                            <td>{{ $x->note }}</td>
                                                            <td>{{ $x->created_at }}</td>
                                                            <td>{{ $x->user }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab6">
                                            <!--المرفقات-->
                                            @can('Permission.AddAttachment')
                                            <div class="card card-statistics">
                                                    <div class="card-body">
                                                        <p class="text-danger">* {{ trans('invoices.AttachmentsFormula')}} pdf, jpeg ,.jpg , png </p>
                                                        <h5 class="card-title">{{ trans('invoices.attachments')}}</h5>
                                                        <form method="post" action="{{ url('/InvoiceAttachments') }}"
                                                              enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="customFile"
                                                                       name="file_name" required>
                                                                <input type="hidden" id="customFile" name="invoice_number"
                                                                       value="{{ $invoices->invoice_number }}">
                                                                <input type="hidden" id="invoice_id" name="invoice_id"
                                                                       value="{{ $invoices->id }}">
                                                                <label class="custom-file-label"  for="customFile">{{ trans('invoices.attachments')}}</label>
                                                            </div><br><br>
                                                            <button type="submit" class="btn btn-primary btn-sm "
                                                                    name="uploadedFile">{{ trans('invoices.attachments')}}</button>
                                                        </form>
                                                    </div>
                                                @endcan
                                                <br>

                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0 table table-hover"
                                                        style="text-align:center">
                                                        <thead>
                                                        <tr class="text-dark">
                                                            <th scope="col">#</th>
                                                            <th scope="col">{{ trans('invoices.NameFile')}}</th>
                                                            <th scope="col">{{ trans('invoices.NameFolder')}}</th>
                                                            <th scope="col">{{ trans('invoices.Created_at')}}</th>
                                                            <th scope="col">{{ trans('invoices.Created_by')}}</th>
                                                            <th scope="col">{{ trans('invoices.Processes')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i = 0; ?>
                                                        @foreach ($attachments as $attachment)
                                                            <?php $i++; ?>
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $attachment->file_name }}</td>
                                                                <td>{{ $attachment->invoice_number }}</td>
                                                                <td>{{ $attachment->created_by }}</td>
                                                                <td>{{ $attachment->created_at }}</td>
                                                                <td colspan="2">

                                                                    <a class="btn btn-outline-success btn-sm"
                                                                    href="{{ url('View_file') }}/{{ $invoices->invoice_number }}/{{ $attachment->file_name }}"
                                                                    role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                    {{ trans('invoices.Show')}}</a>

                                                                    <a class="btn btn-outline-info btn-sm"
                                                                    href="{{ url('Download_file') }}/{{ $invoices->invoice_number }}/{{ $attachment->file_name }}"
                                                                    role="button"><i
                                                                            class="fas fa-download"></i>&nbsp;
                                                                            {{ trans('invoices.Download')}}</a>
                                                                    @can('Permission.DeleteAttachment')
                                                                        <button class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-file_name="{{ $attachment->file_name }}"
                                                                                data-invoice_number="{{ $attachment->invoice_number }}"
                                                                                data-id_file="{{ $attachment->id }}"
                                                                                data-target="#delete_file">{{ trans('invoices.Delete')}}</button>
                                                                @endcan
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /div -->
        </div>

    </div>
                                        <!--/div-->
    <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('invoices.AttachmentsDelete')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('delete_file') }}" method="post">

                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> {{ trans('invoices.SuccessDelete')}} ?</h6>
                        </p>

                        <input type="hidden" name="id_file" id="id_file" value="">
                        <input type="hidden" name="file_name" id="file_name" value="">
                        <input type="hidden" name="invoice_number" id="invoice_number" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('invoices.cancel')}}</button>
                        <button type="submit" class="btn btn-danger">{{ trans('invoices.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
     </div>
    </div>
  </div>
 </div>
				<!-- row closed -->

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

    <script>
        $('#delete_file').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_file = button.data('id_file')
            var file_name = button.data('file_name')
            var invoice_number = button.data('invoice_number')
            var modal = $(this)
            modal.find('.modal-body #id_file').val(id_file);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(invoice_number);
        })

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

    </script>


@endsection
