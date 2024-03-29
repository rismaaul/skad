@extends('layouts.app')

@section('title', 'Log Activity')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center ">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hovered DataTable">
                        <thead>
                            <tr>
                                <th>Log ID</th>
                                <th>Auth</th>
                                <th>Entity</th>
                                <th>Entity ID</th>
                                <th>Action</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($logs as $log)
                                <tr>
                                    <td>{{ $log->id }}</td>
                                    <td>{{ $log->auth }}</td>
                                    <td>{{ $log->entity }}</td>
                                    <td>{{ $log->entity_id }}</td>
                                    <td>{{ $log->action }}</td>
                                    <td>{{ $log->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $logs->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script type="module">
        $('.table').DataTable();
    </script>
@endsection