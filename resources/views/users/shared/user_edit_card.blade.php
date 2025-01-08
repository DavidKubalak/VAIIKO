<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:35px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageUrl() }}"
                         alt="{{ $user->name }}">
                    <div>
                        <input name="name" value="{{ $user->name }}" type="text" class="form-control">
                        @error('name')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <label for="image">Profile Picture</label>
                <input name="image" class="form-control" type="file">
                @error('image')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
                @if($user->image)
                <div class="mt-4 d-flex align-items-center">
                    <input type="checkbox" id="remove_image" name="remove_image" value="1" class="mb-3 me-4">
                    <label for="remove_image" class="mt-0">Remove current profile picture</label>
                </div>
                @endif
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                <div class="mb-3">
                    <textarea name="bio" class="form-control" id="bio" rows="3">{{ $user->bio }}</textarea>
                    @error('bio')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <button class='btn btn-dark btn-sm mb-3'>Save</button>
                @include('users.shared.user_stats')
            </div>
        </form>
    </div>
</div>
