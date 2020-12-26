@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">

                    <div>
                        <form id="search_form">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="name">{{ trans('common.name') }}</label>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="{{ trans('common.name') }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="country_id">@lang('common.country')</label>
                                    <select class="form-control form-small" id="country_id">
                                        <option value="">@lang('common.all')</option>
                                        @foreach ($countries as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="status">@lang('common.status')</label>
                                    <select class="form-control form-small" id="status">
                                        <option value="">@lang('common.all')</option>
                                        <option value="1">@lang('common.active')</option>
                                        <option value="0">@lang('common.inactive')</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 my-auto">
                                    <input type="reset" id="clear_btn" class="btn btn-primary"
                                        value="{{ trans('common.clear_search') }}">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="m-b-15">
                        <div class="form-row">

                            <a href="{{ route($model_plural . '.create') }}" id="info" class="btn btn-primary mr-1"><i
                                    class="fa fa-plus"></i> @lang('common.create')</a>

                            <button id="activate" value="1" class="status_btn btn btn-success mr-1">
                                @lang('common.activate')
                            </button>
                            <button id="deactivate" value="0"
                                class="status_btn btn btn-secondary mr-1">@lang('common.deactivate')
                            </button>
                            <button id="delete_btn" class="delete-btn btn btn-danger mr-1"><i
                                    class="fa fa-trash-o"></i>@lang('common.delete')</button>
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
                                    <th>@lang('common.id')</th>
                                    <th>@lang('common.name_ar')</th>
                                    <th>@lang('common.name_en')</th>
                                    <th>@lang('common.country')</th>
                                    <th>@lang('common.main_service')</th>
                                    <th>@lang('common.image')</th>
                                    <th>@lang('common.status')</th>
                                    <th class="text-center">@lang('common.actions')</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset(config('app.diraction') . '/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset(config('app.diraction') . '/plugins/table/datatable/custom_dt_html5.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset(config('app.diraction') . '/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/ltr/plugins/select2/select2.min.css') }}">
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
    <script src="{{ asset('/ltr/plugins/select2/select2.min.js') }}"></script>
    <script>
        const dataTable = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('datatable.' . $model_plural) }}",
                data: function(d) {
                    d.status = $('#status').val(),
                        d.name = $('#name').val(),
                        d.country_id = $('#country_id').val()
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
                            '" class="   checkbox-tick" type="checkbox" name="table_ids[]">' +
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
                    data: 'country',
                    name: 'country'
                },
                {
                    data: 'main_service',
                    name: 'main_service'
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: false,
                    searchable: false,
                    printable: false
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false,
                    printable: false,
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
                buttons: [{
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


        document.querySelector('#name').addEventListener('keyup', function() {
            dataTable.draw();
        });

        document.querySelector('#status').onchange = function() {
            dataTable.draw();
        }

        document.querySelector('#country_id').onchange = function() {
            dataTable.draw();
        }

        document.querySelector('#clear_btn').addEventListener('click', function(p) {
            setTimeout(() => {
                dataTable.draw();
            }, 1000);
        })

        document.querySelector('#data-table_wrapper').addEventListener('click', function(event) {
            const deleteRow = event.target;
            if (deleteRow.className.includes('btn-danger')) {
                conformAction().then(() => {
                    axois.delete(route('{{ $model_plural }}' + '.destroy', deleteRow.getAttribute(
                        'data-id'))).then(res => {
                        swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: res.data.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            dataTable.draw();
                        })
                    })
                });
            }
        });

        var formSmall = $(".form-small").select2({
            dir: 'ltr'
        });

        document.querySelector('#activate').addEventListener('click', function() {
            const ids = getSelectedIds();
            if (ids) {
                conformAction().then((result) => {
                    if (result.isConfirmed) {
                        axois.patch(route('models.active', '{!!  $model !!}'), {
                            ids
                        }).then(res => {
                            swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: res.data.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                dataTable.draw();
                            })
                        })

                    }
                })

            }
        });

        document.querySelector('#deactivate').addEventListener('click', function() {
            const ids = getSelectedIds();
            if (ids) {
                conformAction().then((result) => {
                    if (result.isConfirmed) {
                        axois.patch(route('models.deactive', '{!!  $model !!}'), {
                            ids
                        }).then(res => {
                            swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: res.data.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                dataTable.draw();
                            })
                        })

                    }
                })

            }
        });

        document.querySelector('#delete_btn').addEventListener('click', function() {
            const ids = getSelectedIds();
            if (ids) {
                conformAction().then((result) => {
                    if (result.isConfirmed) {
                        axois.delete(route('models.destroy', '{!!  $model !!}'), {
                            data: {
                                ids
                            }
                        }).then(res => {
                            swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: res.data.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                dataTable.draw();
                            })
                        })

                    }
                })

            }
        });


        function getSelectedIds() {
            const ids = [];
            $("input:checkbox:checked").each(function() {
                ids.push($(this).val());
            });

            if (ids.length <= 0) {
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href>Why do I have this issue?</a>'
                })
                return;
            }
            return ids;
        }


        function conformAction() {
            return swal.fire({
                title: translate('common.confirm'),
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: translate('common.yes'),
                cancelButtonText: translate('common.cancel')
            })
        }

    </script>
@endpush
