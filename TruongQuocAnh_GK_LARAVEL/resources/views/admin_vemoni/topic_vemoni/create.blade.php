@extends('admin_vemoni.layouts_vemoni.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-6">
                    <h1>Add topic</h1>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('topics.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="" method="post" id="topicForm" name="topicForm">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name">Topic Name</label>
                                    <input type="text" name="topicName" id="topicName" class="form-control"
                                        placeholder="Topic Name">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Topic Description</label>
                                    <textarea name="topicDescription" id="topicDescription" cols="30" rows="10" class="summernote"
                                        placeholder="Topic Description"></textarea>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Supervior ID</label>
                                    <select name="supervisorId" id="supervisorId" class="form-control">
                                        <option value="1">Có</option>
                                        <option value="0">Không</option>
                                    </select>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Topic Type</label>
                                    <input type="text" name="topicType" id="topicType" class="form-control"
                                        placeholder="Topic Type">
                                    <p></p>
                                </div>
                            </div>

                            <div class="pt-1">
                                <button type="submit" class="btn btn-success ml-2"><i
                                        class="fas fa-plus-circle"></i>&nbsp;Create</button>
                                <a href="{{ route('topics.create') }}" class="btn btn-outline-dark ml-3"><i
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
        $("#topicForm").submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $("button[type=submit]").prop('disabled', true);
            $.ajax({
                url: '{{ route('topics.store') }}',
                type: 'post',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response) {
                    $("button[type=submit]").prop('disabled', false);

                    if (response["status"] == true) {

                        window.location.href = "{{ route('topics.index') }}";

                        $("#topicName").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");

                        $("#topicDescription").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");

                        $("#supervisorId").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");

                        $("#topicType").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");

                    } else {

                        var errors = response['errors'];
                        if (errors['topicName']) {
                            $("#topicName").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback').html(errors['topicName']);
                        } else {
                            $("#topicName").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback').html("");
                        }

                        if (errors['topicDescription']) {
                            $("#topicDescription").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback').html(errors['topicDescription']);
                        } else {
                            $("#topicDescription").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback').html("");
                        }

                        if (errors['supervisorId']) {
                            $("#supervisorId").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback').html(errors['supervisorId']);
                        } else {
                            $("#supervisorId").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback').html("");
                        }

                        if (errors['topicType']) {
                            $("#topicType").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback').html(errors['topicType']);
                        } else {
                            $("#topicType").removeClass('is-invalid')
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
