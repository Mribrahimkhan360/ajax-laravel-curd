<form id="createStudentForm" action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group mt-4">
        <input type="text" class="form-control text-danger" id="name" name="name" placeholder="Name">
        <div class="nameError errors d-none"></div>
    </div>
    <div class="form-group mt-4">
        <input type="email" class="form-control text-danger" id="email" name="email" placeholder="admin@admin.com">
        <div class="emailError errors d-none"></div>
    </div>
    <div class="form-group mt-4">
        <input type="file" class="form-control text-danger" name="photo" id="photo">
        <div class="mt-2 pt-2">
            <img class="img_preivew" alt="" height="100">
        </div>
        <div class="photoError errors d-none"></div>
    </div>
    <div class="btn-groups mt-4 text-end">
        <button type="submit" class="btn btn-sm btn-secondary btnbox-cancel">Cancel</button>
        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
    </div>
</form>
