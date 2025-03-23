@extends('students.layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col">
                <h2>Student Create</h2>
            </div>
            <div class="col float-end">
                <a title="Create" href="{{ route('students.create') }}" id="BootmyModalShow" class="btn btn-primary float-end">Add Student</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-content">
                    <table class="table table-hover table-responsive table-bordered">
                    <thead>
                    <tr class="table-active">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Photo</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($students as $key=> $student)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $student['name']}}</td>
                        <td>{{ $student['email']}}</td>
                        <td><img class="" src="{{ asset('uploads/student_img/' . $student->photo) }}" height="50" alt="Student Photo"></td>
                        <td class="text-center">
                            <a title="View" href=""><i class="fa-solid fa-eye"></i></a>
                            <a title="Edit" href="{{ route('students.edit',$student->id) }}" id="BootmyModalShow"><i class="fa-solid fa-pen-to-square" style="margin: 0px 5px"></i></a>
                            <a title="Delete" href=""><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @empty
                        <tr><td><b>No data exist!</b></td></tr>
                    @endforelse
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('bootBox')
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- dialog body -->
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    Hello world!
                </div>
                <!-- dialog buttons -->
                <div class="modal-footer"><button type="button" class="btn btn-primary">OK</button></div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            let dialog = '';
            $(document).on('click','#BootmyModalShow',function(e){
                e.preventDefault();
                let modalUrl = $(this).attr('href');
                let modalTitle = $(this).attr('title');

                //alert(modalUrl);

                $.ajax({
                    type: "GET",
                    url: modalUrl,
                    success: function (res) {
                         dialog = bootbox.dialog({
                            title: 'Student '+modalTitle,
                            message: "<div class='ModalContent'>Student</div>",
                            size: 'large'
                        });
                        $('.ModalContent').html(res);
                    }
                });

            });

            $(document).on('submit','#createStudentForm',function (e) {
                e.preventDefault();
                //ajax
                let formData = new FormData($('#createStudentForm')[0]);
                $.ajax({
                    type: "POST",
                    url: "{{ route('students.store') }}",
                    data: formData,
                    processData: false,
                    contentType:false,
                    success: function (res) {
                        console.log(res);
                        if (res.status === 400){
                            $('.errors').html('');
                            $('.errors').removeClass('d-none');

                            $('.nameError').text(res.errors.name);
                            $('.emailError').text(res.errors.email);
                            $('.photoError').text(res.errors.photo);
                        }else{
                            $('.errors').html('');
                            $('.errors').addClass('d-none');
                            $('.table-content').load(location.href + ' .table-content');
                           // $('.table-content').load(location.href + ' .table-content');

                            dialog.modal('hide');
                        }
                    }
                })
            })


            $(document).on('change', '#photo', function (e) {
                e.preventDefault();
                //const file = $(this).files[0];
                const file = e.target.files[0];

                if(file)
                {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        $('.img_preivew').attr('src',e.target.result);

                    };
                    reader.readAsDataURL(file)
                    //reader.readAsDataURL(file);
                }
            })
        });
    </script>
@endsection
