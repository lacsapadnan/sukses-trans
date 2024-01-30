<div class="modal fade" tabindex="-1" id="kt_modal_2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Upload Surat Jalan Container</h3>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body">
                <form action="{{ route('uploadFile') }}" method="POST" id="uploadForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="selectedContainerId" name="id" value="">
                    <div class="mb-6">
                        <label for="name" class="required form-label">Surat Jalan</label>
                        <input type="file" name="file" id="fileInput" class="form-control" required>
                    </div>
                    <button type="submit" id="uploadButton" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
