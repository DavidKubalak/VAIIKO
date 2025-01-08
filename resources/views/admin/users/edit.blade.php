<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form id="edit-user-form" enctype="multipart/form-data" method="POST" action="">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img id="edit-user-image" style="width:150px" class="me-3 avatar-sm rounded-circle" src=""
                         alt="">
                    <div>
                        <input id="edit-user-name" name="name" value="" type="text" class="form-control">
                        @error('name')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <label for="edit-user-email">Email</label>
                <input id="edit-user-email" name="email" value="" type="text" class="form-control">
                @error('email')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="edit-user-image">Profile Picture</label>
                <input name="image" class="form-control" type="file">
                @error('image')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5">Bio:</h5>
                <div class="mb-3">
                    <textarea id="edit-user-bio" name="bio" class="form-control" rows="3"></textarea>
                    @error('bio')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <button class='btn btn-dark btn-sm mb-3'>Save</button>
            </div>
        </form>
    </div>
</div>
