<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah user</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="required form-label">Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Masukan nama user"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="name" class="required form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukan email user"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="name" class="required form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukan password user"
                            required>
                        <div class="text-muted">
                            Minimal 6 karakter dengan kombinasi huruf dan angka
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="name" class="required form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Masukan konfirmasi password user" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
