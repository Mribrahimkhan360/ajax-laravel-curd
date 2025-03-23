<form id="createStudentForm" action="{{ route('students.store') }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group mt-4">
        <input type="text" class="form-control text-danger" id="name" name="name" value="{{ $student->name }}">
        <div class="nameError errors d-none"></div>
    </div>
    <div class="form-group mt-4">
        <input type="email" class="form-control text-danger" id="email" name="email" value="{{ $student->email }}">
        <div class="emailError errors d-none"></div>
    </div>
    <div class="form-group mt-4">
        <input type="file" class="img_preview form-control text-danger" name="photo" id="photo">
        <img class="img_preview" src="{{ asset('uploads/student_img/' . $student->photo) }}" height="50" alt="Student Photo">

        <div class="photoError errors d-none"></div>
    </div>
    <div class="btn-groups mt-4 text-end">
        <button type="button" class="btn btn-sm btn-secondary bootbox-close-button">Cancel</button>
        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
    </div>
</form>
