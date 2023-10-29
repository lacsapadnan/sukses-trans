@extends('layouts.master')

@section('title', 'Surat Jalan')
@section('page-title', 'Surat Jalan List')
@section('breadcrumb', 'Tambah Surat Jalan')

@section('content')
    <div class="card">
        <div class="pt-6 border-0 card-header">
            <div class="card-body">
                <form action="{{ route('delivery-order.store') }}" method="post">
                    @csrf
                    <div class="mb-6 row">
                        <div class="col-md-4">
                            <label for="name" class="required form-label">Nomor Surat Jalan</label>
                            <input type="number" name="number" class="form-control" placeholder="Masukan nomor surat jalan"
                                required>
                        </div>
                        <div class="col-md-4">
                            <label for="name" class="required form-label">Nomor PO</label>
                            <input type="number" name="po_number" class="form-control" placeholder="Masukan nomor po"
                                required>
                        </div>
                        <div class="col-md-4">
                            <label for="name" class="required form-label">Tanggal</label>
                            <div class="input-group" id="kt_td_picker_date" data-td-target-input="nearest"
                                data-td-target-toggle="nearest">
                                <input id="kt_td_picker_date" type="text" class="form-control"
                                    data-td-target="#kt_td_picker_date" name="date" />
                                <span class="input-group-text" data-td-target="#kt_td_picker_date"
                                    data-td-toggle="datetimepicker">
                                    <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 row">
                        <div class="col-md-4">
                            <label for="name" class="required form-label">Dikirim Dengan</label>
                            <input type="text" name="delivery_with" class="form-control"
                                placeholder="Masukan kendaraan pengiriman" required>
                        </div>
                        <div class="col-md-4">
                            <label for="name" class="required form-label">No. Polisi</label>
                            <input type="text" name="police_number" class="form-control"
                                placeholder="Masukan no. polisi kendaraan" required>
                        </div>
                        <div class="col-md-4">
                            <label for="name" class="required form-label">Nama Pengemudi</label>
                            <input type="text" name="driver_name" class="form-control"
                                placeholder="Masukan nama pengemudi" required>
                        </div>
                    </div>
                    <div id="kt_docs_repeater_advanced" class="mb-10">
                        <!--begin::Form group-->
                        <div class="form-group">
                            <div data-repeater-list="produk">
                                <div data-repeater-item>
                                    <div class="mb-5 form-group row">
                                        <div class="col-md-3">
                                            <label class="form-label">Produk</label>
                                            <select name="product_id" class="form-select" data-kt-repeater="select2"
                                                data-placeholder="Pilih produk">
                                                <option></option>
                                                @forelse ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @empty
                                                    <option value="">Tidak ada produk</option>
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Jumlah Packing</label>
                                            <input type="number" name="packing_quantity" class="form-control" placeholder="Masukan jumlah packing" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Jumlah Barang</label>
                                            <input type="number" name="quantity" class="form-control" placeholder="Masukan jumlah barang" />
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Deskripsi</label>
                                            <input type="text" name="description" class="form-control" placeholder="Masukan deskripsi" />
                                        </div>

                                        <div class="col-md-2">
                                            <a href="javascript:;" data-repeater-delete
                                                class="mt-3 btn btn-flex btn-sm btn-light-danger mt-md-9">
                                                <i class="ki-duotone ki-trash fs-3"><span class="path1"></span><span
                                                        class="path2"></span><span class="path3"></span><span
                                                        class="path4"></span><span class="path5"></span></i>
                                                Hapus
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Form group-->

                        <!--begin::Form group-->
                        <div class="form-group">
                            <a href="javascript:;" data-repeater-create class="btn btn-flex btn-light-primary">
                                <i class="ki-duotone ki-plus fs-3"></i>
                                Tambah produk
                            </a>
                        </div>
                        <!--end::Form group-->
                    </div>
                    <!--end::Repeater-->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('addon-script')
    <script src="{{ URL::asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script>
        new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_date"), {
            localization: {
                locale: "id",
                startOfTheWeek: 1
            },
            display: {
                viewMode: "calendar",

                components: {
                    decades: true,
                    year: true,
                    month: true,
                    date: true,
                    hours: false,
                    minutes: false,
                    seconds: false
                }
            }
        });
    </script>
    <script>
        $('#kt_docs_repeater_advanced').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();

                // Re-init select2
                $(this).find('[data-kt-repeater="select2"]').select2();

                // Re-init tagify
                new Tagify(this.querySelector('[data-kt-repeater="tagify"]'));
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            },

            ready: function() {
                // Init select2
                $('[data-kt-repeater="select2"]').select2();

                // Init Tagify
                new Tagify(document.querySelector('[data-kt-repeater="tagify"]'));
            }
        });
    </script>
@endpush
