@extends('layouts.master')

@section('title', 'Surat Jalan')
@section('page-title', 'Surat Jalan List')
@section('breadcrumb', 'Surat Jalan Management')

@push('addon-style')
    <link href="{{ URL::asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    @if (session()->has('success'))
        <!--begin::Alert-->
        <div class="p-5 mb-10 alert alert-success d-flex align-items-center">
            <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span
                    class="path2"></span></i>
            <div class="d-flex flex-column">
                <h4 class="mb-1 text-success">Sukses</h4>
                <span>{{ session()->get('success') }}</span>
            </div>
            <button type="button"
                class="top-0 m-2 position-absolute position-sm-relative m-sm-0 end-0 btn btn-icon ms-sm-auto"
                data-bs-dismiss="alert">
                <i class="ki-duotone ki-cross fs-2x text-success"><span class="path1"></span><span
                        class="path2"></span></i>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="pt-6 border-0 card-header">
            <div class="card-title">
                <!--begin::Search-->
                <div class="my-1 d-flex align-items-center position-relative">
                    <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-4"><span class="path1"></span><span
                            class="path2"></span></i> <input type="text" data-kt-filter="search"
                        class="form-control form-control-solid w-250px ps-14" placeholder="Cari data user">
                </div>
                <!--end::Search-->
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <button type="button" class="btn btn-light-primary me-2" data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-exit-down fs-2"><span class="path1"></span><span class="path2"></span></i>
                        Export Data
                    </button>
                    <a href="{{ route('delivery-order.create') }}" type="button" class="btn btn-primary">
                        Tambah Data
                    </a>
                    <!--begin::Menu-->
                    <div id="kt_datatable_example_export_menu"
                        class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="px-3 menu-item">
                            <a href="#" class="px-3 menu-link" data-kt-export="copy">
                                Copy to clipboard
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="px-3 menu-item">
                            <a href="#" class="px-3 menu-link" data-kt-export="excel">
                                Export as Excel
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="px-3 menu-item">
                            <a href="#" class="px-3 menu-link" data-kt-export="csv">
                                Export as CSV
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="px-3 menu-item">
                            <a href="#" class="px-3 menu-link" data-kt-export="pdf">
                                Export as PDF
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <div id="kt_datatable_example_buttons" class="d-none"></div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="kt_datatable_example_wrapper dt-bootstrap4 no-footer" class="datatables_wrapper">
                <div class="table-responsive">
                    <table class="table table-striped table-row-bordered gy-5 gs-7" id="kt_datatable_example">
                        <thead>
                            <tr class="text-gray-800 fw-semibold fs-6">
                                <th>No.</th>
                                <th>No. Surat Jalan</th>
                                <th>No. PO</th>
                                <th>Dikirim Dengan</th>
                                <th>No. Polisi</th>
                                <th>Nama Pengemudi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-900 fw-semibold">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @includeIf('pages.deliveryOrder.modal')
@endsection

@push('addon-script')
    <script src="{{ URL::asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        "use strict";

        // Class definition
        var KTDatatablesExample = function() {
            // Shared variables
            var table;
            var datatable;

            // Private functions
            var initDatatable = function() {
                // Set date data order
                const tableRows = table.querySelectorAll('tbody tr');

                // Init datatable --- more info on datatables: https://datatables.net/manual/
                datatable = $(table).DataTable({
                    order: [],
                    responsive: true,
                    pageLength: 10,
                    "ajax": {
                        url: '{{ route('deliveryOrder.data') }}',
                        type: 'GET',
                        dataSrc: '',
                    },
                    "columns": [{
                            data: null,
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            },
                        },
                        {
                            data: 'number'
                        },
                        {
                            data: 'po_number'
                        },
                        {
                            data: 'delivery_with'
                        },
                        {
                            data: 'police_number'
                        },
                        {
                            data: 'driver_name'
                        },
                        {
                            data: 'date',
                             render: function(data, type, row) {
                                // format date ID
                                var date = new Date(data);
                                var options = {
                                    year: 'numeric',
                                    month: 'long',
                                    day: 'numeric'
                                };
                                return new Intl.DateTimeFormat('id-ID', options).format(date);
                            }
                        },
                        {
                            data: null
                        },
                    ],
                    "columnDefs": [{
                        className: 'min-w-200px',
                        targets: 7,
                        render: function(data, type, row) {
                            var editUrl = "/delivery-order/" + row.id + "/edit";
                            var deleteUrl = "/delivery-order/" + row.id;

                            return '<a href="' + editUrl +
                                '" type="button" class="btn btn-sm btn-warning me-2">Edit</a>' +
                                '<form action="' + deleteUrl +
                                '" method="POST" class="d-inline">' +
                                '@csrf' +
                                '@method('delete')' +
                                '<button class="btn btn-sm btn-danger">Hapus</button>' +
                                '</form>';
                        },


                    }, ]
                });
            }

            // Hook export buttons
            var exportButtons = () => {
                const documentTitle = 'Surat Jalan Data Report';
                var buttons = new $.fn.dataTable.Buttons(table, {
                    buttons: [{
                            extend: 'copyHtml5',
                            title: documentTitle
                        },
                        {
                            extend: 'excelHtml5',
                            title: documentTitle
                        },
                        {
                            extend: 'csvHtml5',
                            title: documentTitle
                        },
                        {
                            extend: 'pdfHtml5',
                            title: documentTitle
                        }
                    ]
                }).container().appendTo($('#kt_datatable_example_buttons'));

                // Hook dropdown menu click event to datatable export buttons
                const exportButtons = document.querySelectorAll(
                    '#kt_datatable_example_export_menu [data-kt-export]');
                exportButtons.forEach(exportButton => {
                    exportButton.addEventListener('click', e => {
                        e.preventDefault();

                        // Get clicked export value
                        const exportValue = e.target.getAttribute('data-kt-export');
                        const target = document.querySelector('.dt-buttons .buttons-' +
                            exportValue);

                        // Trigger click event on hidden datatable export buttons
                        target.click();
                    });
                });
            }

            // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
            var handleSearchDatatable = () => {
                const filterSearch = document.querySelector('[data-kt-filter="search"]');
                filterSearch.addEventListener('keyup', function(e) {
                    datatable.search(e.target.value).draw();
                });
            }

            // Public methods
            return {
                init: function() {
                    table = document.querySelector('#kt_datatable_example');

                    if (!table) {
                        return;
                    }

                    initDatatable();
                    exportButtons();
                    handleSearchDatatable();
                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTDatatablesExample.init();
        });
    </script>
@endpush
