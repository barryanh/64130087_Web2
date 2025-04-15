@extends('admin_vemoni.layouts_vemoni.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-6">
                    <h1>View topic</h1>
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
                                        placeholder="Topic Name" value="{{ $topic->topicName }}" disabled>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Topic Description</label>
                                    <textarea name="topicDescription" id="topicDescription" cols="30" rows="10" class="summernote"
                                        placeholder="Topic Description">{{ $topic->topicDescription }}</textarea>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Supervior ID</label>
                                    <select name="supervisorId" id="supervisorId" class="form-control" disabled>
                                        <option {{ $topic->supervisorId == 1 ? 'selected' : '' }} value="1">Có
                                        </option>
                                        <option {{ $topic->supervisorId == 0 ? 'selected' : '' }} value="0">Không
                                        </option>
                                    </select>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Topic Type</label>
                                    <input type="text" name="topicType" id="topicType" class="form-control"
                                        placeholder="Topic Type" value="{{ $topic->topicType }}" disabled>
                                    <p></p>
                                </div>
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
        $('#topicDescription').summernote('disable');
    </script>
@endsection
