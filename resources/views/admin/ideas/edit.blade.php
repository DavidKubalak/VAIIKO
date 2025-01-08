<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form id="edit-idea-form" enctype="multipart/form-data" method="POST" action="">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img id="edit-idea-user-image" style="width:50px" class="me-2 avatar-sm rounded-circle" src=""
                         alt="">
                    <div>
                        <h5 id="edit-idea-user-name" class="card-title mb-0"><a href="#"></a></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="fs-5">Content:</h5>
                <div class="mb-3">
                    <textarea id="edit-idea-content" name="content" class="form-control" rows="3"></textarea>
                    @error('content')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <button class='btn btn-dark btn-sm mb-3'>Save</button>
                <div class="d-flex justify-content-between">
                    <div></div>
                    <div>
                        <span class="fas fa-clock fw-light text-muted"> </span>
                        <span id="edit-idea-created_at" class="fs-6 fw-light text-muted">
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
