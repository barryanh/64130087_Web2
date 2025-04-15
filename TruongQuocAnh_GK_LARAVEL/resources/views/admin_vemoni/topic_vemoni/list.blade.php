@extends('admin_vemoni.layouts_vemoni.app')

@section('content')
    @include('admin_vemoni.common_vemoni.message')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Topic</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('topics.create') }}" class="btn btn-primary">Add Topic</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card">
                <form action="" method="get">
                    <div class="card-header">
                        <div class="card-title">
                            <button type="button" onclick="window.location.href='{{ route('topics.index') }}'"
                                class="btn btn-secondary btn-sm"><i class="fas fa-cogs mr-1"></i>
                                Reset</button>
                        </div>

                        <div class="card-tools">
                            <div class="input-group input-group" style="width: 250px;">
                                <input value="{{ Request::get('keyword') }}" type="text" name="keyword"
                                    class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th width="250">ID</th>
                                <th width="250">Topic Name</th>
                                <th width="250">SuperviorId</th>
                                <th width="250">Topic Type</th>
                                <th width="250">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($topics->isNotEmpty())
                                @foreach ($topics as $topic)
                                    <tr>
                                        <td>{{ $topic->id }}</td>
                                        <td>{{ $topic->topicName }}</td>
                                        <td>
                                            @if ($topic->supervisorId == 1)
                                                <svg class="text-success-500 h-6 w-6 text-success"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            @else
                                                <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                    </path>
                                                </svg>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $topic->topicType }}
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('topics.view', $topic->id) }}"><i
                                                    class="fa fa-eye"></i>&nbsp;&nbsp;View</a>
                                            <a class="btn btn-info btn-sm" href="{{ route('topics.edit', $topic->id) }}"><i
                                                    class="fa fa-pen"></i>&nbsp;&nbsp;Edit</a>
                                            <a class="btn btn-danger btn-sm" onclick="deleteTopic({{ $topic->id }})"><i
                                                    class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" style="text-align: center; font-size: 20px">Records Not Found!</td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $topics->links() }}
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection

@section('customJs')
    <script>
        function deleteTopic(id) {

            var url = '{{ route('topics.destroy', 'ID') }}';
            var newUrl = url.replace("ID", id);

            if (confirm("Are you sure you want to delete?")) {
                $.ajax({
                    url: newUrl,
                    type: 'delete',
                    data: {},
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response["status"]) {
                            window.location.href = "{{ route('topics.index') }}";
                        }
                    }
                });
            }
        }
    </script>
@endsection
