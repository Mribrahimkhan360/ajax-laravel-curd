<form action="{{ route('create.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group mt-4">
        <input type="email" class="form-control" id="name" name="name" placeholder="Name">
        <div class="nameError errors d-none"></div>
    </div>
    <div class="form-group mt-4">
        <input type="email" class="form-control" id="email" name="name" placeholder="admin@admin.com">
        <div class="nameError errors d-none"></div>
    </div>
    <div class="form-group mt-4">
        <input type="file" class="form-control" name="photo">
        <div class="nameError errors d-none"></div>
    </div>
    <div class="btn-groups mt-4 text-end">
        <button type="submit" class="btn btn-sm btn-secondary btnbox-cancel">Cancel</button>
        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
    </div>
</form>
</form>
