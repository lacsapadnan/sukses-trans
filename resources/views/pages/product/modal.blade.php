<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah produk</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form action="{{ route('product.store') }}" method="post">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="required form-label">Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Masukan nama produk"
                            required>
                    </div>
                    <div class="mb-6">
                        <label class="required form-label" for="textarea">Deskripsi</label>
                        <textarea name="description" class="form-control" placeholder="Masukan deskripsi" style="height: 100px"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
