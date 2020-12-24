@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">

                    <div>
                        <form id="search_form">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="name">{{ trans('common.name') }}</label>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="{{ trans('common.name') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="status">@lang('common.status')</label>
                                    <select class="form-control select2-hidden-accessible basic" id="status" tabindex="-1"
                                        aria-hidden="true">
                                        <option selected value="">@lang('common.all')</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 my-auto">
                                    <input type="submit" id="search_btn" class="btn btn-info" value="Search">
                                    <input type="submit" id="clear_btn" class="btn btn-primary" value="Clear search">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="m-b-15">
                        <div class="form-row">

                            <a href="{{ route('countries.create') }}" id="info" class="btn btn-primary mr-1"><i
                                    class="fa fa-plus"></i> Add</a>
                            <button value="1" disabled="" class="status_btn btn btn-success mr-1"> Activate </button>
                            <button value="0" disabled="" class="status_btn btn btn-secondary mr-1">Deactivate </button>
                            <button disabled="" id="delete_btn" class="delete-btn btn btn-danger mr-1"><i
                                    class="fa fa-trash-o"></i>Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="data-table" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name(ar)</th>
                                    <th>Name(en)</th>
                                    <th>currency(ar)</th>
                                    <th>currency(en)</th>
                                    <th>Tax</th>
                                    <th>image</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
<img src="" alt="">

@push('css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset(config('app.diraction') . '/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset(config('app.diraction') . '/plugins/table/datatable/custom_dt_html5.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset(config('app.diraction') . '/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(config('app.diraction') . '/plugins/select2/select2.min.css') }}">
@endpush

@push('js')
    <script src="{{ asset(config('app.diraction') . '/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset(config('app.diraction') . '/plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}">
    </script>

    <script src="{{ asset(config('app.diraction') . '/plugins/table/datatable/button-ext/jszip.min.js') }}"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js'></script>
    <script src="{{ asset(config('app.diraction') . '/plugins/table/datatable/button-ext/buttons.html5.min.js') }}">
    </script>
    <script src="{{ asset(config('app.diraction') . '/plugins/table/datatable/button-ext/buttons.print.min.js') }}">
    </script>
    <script src="{{ asset(config('app.diraction') . '/plugins/select2/select2.min.js') }}"></script>
    <script>
        const dataTable = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('datatable.countries') }}",
                data: function(d) {
                    d.status = $('#status').val(),
                        d.name = $('#name').val()
                },
            },
            dom: '<"row"<"col-md-12"<"row"<"col-md-2"l><"col-md-4"B> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            "columnDefs": [{
                className: "text-center",
                "targets": [-1]
            }],
            columns: [{
                    "render": function(data, type, full, meta) {
                        return '<td>' +
                            '<label class="fancy-checkbox">' +
                            '<input value="' + full.id +
                            '" class="table_ids checkbox-tick" type="checkbox" name="table_ids[]">' +
                            '<span></span>' +
                            '</label>' +
                            '</td>';
                    }
                },
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name_ar',
                    name: 'name_ar'
                },
                {
                    data: 'name_en',
                    name: 'name_en'
                },
                {
                    data: 'currency_ar',
                    name: 'currency_ar'
                },
                {
                    data: 'currency_en',
                    name: 'currency_en'
                },
                {
                    data: 'tax',
                    name: 'tax'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false,
                    'render': function(data, type, full, meta) {
                        if (data != 0) {
                            return '<svg xmlns="http://www.w3.org/2000/svg" class="feather feather-check-circle" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" height="24"><path d="M 22 11.08 V 12 a 10 10 0 1 1 -5.93 -9.14" /><polyline points="22,4 12,14.01 9,11.01" /></svg>';
                        }
                        return '<svg xmlns="http://www.w3.org/2000/svg" class="feather feather-x-circle" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" height="24"><circle cx="12" cy="12" r="10" /><line x1="15" y1="9" x2="9" y2="15" /><line x1="9" y1="9" x2="15" y2="15" /></svg>';
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    printable: false
                }
            ],
            buttons: {
                buttons: [
                    {
                        extend: 'excel',
                        className: 'btn btn-success'
                    },
                    {
                        extend: 'pdf',
                        className: 'btn'
                    },

                    {
                        extend: 'print',
                        className: 'btn'
                    }
                ]
            },
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 5
        });
        //Draw table
        // Name filter
        document.querySelector('#name').addEventListener('keyup', function() {
            dataTable.draw();
        });
        document.querySelector('#status').onchange = function() {
            dataTable.draw();
        }

        $(".basic").select2({
            tags: true,
        });

    </script>
@endpush
