@extends('layouts.master')

@section('title', 'Surat Jalan')
@section('page-title', 'Surat Jalan List')
@section('breadcrumb', 'Edit Surat Jalan')

@section('content')
    <div class="card">
        <div class="pt-6 border-0 card-header">
            <div class="card-body">
                <form action="{{ route('delivery-order.update', $deliveryOrder->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-6 row">
                        <!-- Existing fields with values from $deliveryOrder -->
                        <div class="col-md-4">
                            <label for="number" class="required form-label">Nomor Surat Jalan</label>
                            <input type="number" name="number" class="form-control" value="{{ $deliveryOrder->number }}"
                                required>
                        </div>
                        <div class="col-md-4">
                            <label for="po_number" class="required form-label">Nomor PO</label>
                            <input type="number" name="po_number" class="form-control"
                                value="{{ $deliveryOrder->po_number }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="date" class="required form-label">Tanggal</label>
                            <div class="input-group" id="kt_td_picker_date" data-td-target-input="nearest"
                                data-td-target-toggle="nearest">
                                <input id="kt_td_picker_date" type="text" class="form-control"
                                    data-td-target="#kt_td_picker_date" name="date" value="{{ $deliveryOrder->date }}" />
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
                            <label for="delivery_with" class="required form-label">Dikirim Dengan</label>
                            <input type="text" name="delivery_with" class="form-control"
                                value="{{ $deliveryOrder->delivery_with }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="police_number" class="required form-label">No. Polisi</label>
                            <input type="text" name="police_number" class="form-control"
                                value="{{ $deliveryOrder->police_number }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="driver_name" class="required form-label">Nama Pengemudi</label>
                            <input type="text" name="driver_name" class="form-control"
                                value="{{ $deliveryOrder->driver_name }}" required>
                        </div>
                    </div>

                    <!-- Details repeater section -->
                    <div id="kt_docs_repeater_advanced" class="mb-10">
                        <div data-repeater-list="details">
                            @foreach ($deliveryOrder->details as $detail)
                                <div data-repeater-item>
                                    <div class="mb-5 form-group row">
                                        <div class="col-md-3">
                                            <label class="form-label">Produk</label>
                                            <select name="details[{{ $loop->index }}][product_id]" class="form-select"
                                                data-kt-repeater="select2" data-placeholder="Pilih produk">
                                                <option value="{{ $detail->product->id }}" selected>
                                                    {{ $detail->product->name }}</option>
                                                @forelse ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @empty
                                                    <option value="">Tidak ada produk</option>
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Jumlah Packing</label>
                                            <input type="number" name="details[{{ $loop->index }}][packing_quantity]"
                                                class="form-control" value="{{ $detail->packing_quantity }}"
                                                placeholder="Masukan jumlah packing" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Jumlah Barang</label>
                                            <input type="number" name="details[{{ $loop->index }}][quantity]"
                                                class="form-control" value="{{ $detail->quantity }}"
                                                placeholder="Masukan jumlah barang" />
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Deskripsi</label>
                                            <input type="text" name="details[{{ $loop->index }}][description]"
                                                class="form-control" value="{{ $detail->description }}"
                                                placeholder="Masukan deskripsi" />
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
                            @endforeach
                        </div>
                        <div class="form-group">
                            <a href="javascript:;" data-repeater-create class="btn btn-flex btn-light-primary">
                                <i class="ki-duotone ki-plus fs-3"></i>
                                Tambah produk
                            </a>
                        </div>
                    </div>

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
