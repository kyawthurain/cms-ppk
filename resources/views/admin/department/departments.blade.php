@extends ('layouts.master')

@section('content')

<div id="content">

<div class="container">
    <div class="row mt-5">
        <div class="col-md-2">
            <a href="{{route('departments.create')}}" class="btn btn-dark">Add New Department</a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Department Code</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($departments as $department)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$department->code}}</td>
                        <td>{{$department->name}}</td>
                        <td>{{$department->phone}}</td>
                        

                    </tr>
                    @empty
                    <tr>
                        <td colspan="4"><span class="text-danger">No Department Data</span></td>
                    </tr>
                </tbody>
                @endforelse
            </table>
        </div>
    </div>
</div>

</div>

@endsection