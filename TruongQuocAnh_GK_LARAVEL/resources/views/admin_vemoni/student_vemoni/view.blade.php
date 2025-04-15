@extends('admin_vemoni.layouts_vemoni.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-6">
                    <h1>View student</h1>
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
            <form action="" method="post" id="studentForm" name="studentForm">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Student Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Topic Name" value="{{ $student->name }}" disabled>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Group ID</label>
                                    <select name="groupId" id="groupId" class="form-control" disabled>
                                        <option {{ $student->groupId == 1 ? 'selected' : '' }} value="1">Có
                                        </option>
                                        <option {{ $student->groupId == 0 ? 'selected' : '' }} value="0">Không
                                        </option>
                                    </select>
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
