@extends('admin_vemoni.layouts_vemoni.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-6">
                    <h1>Add Student</h1>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('students.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form method="post" id="studentForm" name="studentForm">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Student Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Student Name">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Supervior ID</label>
                                    <select name="groupId" id="groupId" class="form-control">
                                        <option value="1">Có</option>
                                        <option value="0">Không</option>
                                    </select>
                                    <p></p>
                                </div>
                            </div>

                            <div class="pt-1">
                                <button type="submit" class="btn btn-success ml-2"><i
                                        class="fas fa-plus-circle"></i>&nbsp;Create</button>
                                <a href="{{ route('students.create') }}" class="btn btn-outline-dark ml-3"><i
                                        class="fas fa-ban"></i>&nbsp;Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection

@section('customJs')
    <script>
        $("#studentForm").submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $("button[type=submit]").prop('disabled', true);
            $.ajax({
                url: '{{ route('students.store') }}',
                type: 'post',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response) {
                    $("button[type=submit]").prop('disabled', false);

                    if (response["status"] == true) {

                        window.location.href = "{{ route('students.index') }}";

                        $("#name").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");

                        $("#groupId").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");

                    } else {

                        var errors = response['errors'];
                        if (errors['name']) {
                            $("#name").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback').html(errors['name']);
                        } else {
                            $("#name").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback').html("");
                        }

                        if (errors['groupId']) {
                            $("#groupId").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback').html(errors['groupId']);
                        } else {
                            $("#groupId").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback').html("");
                        }

                    }
                },
                error: function(jqXHR, exception) {
                    console.log("Đã xảy ra lỗi!");
                }
            });
        });
    </script>
@endsection
