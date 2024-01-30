<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah container</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form action="{{ route('container.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label for="name" class="required form-label">Invoice</label>
                                <input type="text" name="invoice" class="form-control" placeholder="Masukan invoice"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label for="name" class="required form-label">Nama Consignee</label>
                                <input type="text" name="consignee_name" class="form-control"
                                    placeholder="Masukan nama consigne" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label for="name" class="required form-label">Tanggal Keluar Container</label>
                                <div class="input-group" id="kt_td_picker_out_date" data-td-target-input="nearest"
                                    data-td-target-toggle="nearest">
                                    <input id="kt_td_picker_out_date" type="text" class="form-control"
                                        data-td-target="#kt_td_picker_out_date" name="out_date" />
                                    <span class="input-group-text" data-td-target="#kt_td_picker_out_date"
                                        data-td-toggle="datetimepicker">
                                        <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span
                                                class="path2"></span></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label for="name" class="required form-label">No. Pengajuan</label>
                                <input type="text" name="application_number" class="form-control" placeholder="Masukan no. pengajuan" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label for="name" class="required form-label">No. BL</label>
                                <input type="text" name="bl_number" class="form-control" placeholder="Masukan no. BL" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label for="name" class="required form-label">No. Container</label>
                                <input type="text" name="container_number" class="form-control" placeholder="Masukan no. container" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label for="name" class="required form-label">Repair</label>
                                <input type="number" name="repair" class="form-control" placeholder="Masukan repair" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label for="name" class="required form-label">Lift Off</label>
                                <input type="number" name="lift_off" class="form-control" placeholder="Masukan lift off" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label for="name" class="required form-label">Demurrage</label>
                                <input type="number" name="demurrage" class="form-control" placeholder="Masukan demurrage" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label for="name" class="required form-label">Tujuan Container</label>
                                <input type="text" name="destination" class="form-control" placeholder="Masukan tujuan container" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
