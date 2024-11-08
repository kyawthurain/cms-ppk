@extends ('layouts.master')

@section('content')

<div id="content">

<div class="container">
    <div class="row mt-5">
        <div class="col-md-2">
            <a href="{{route('teams.create')}}" class="btn btn-dark">Add New Team</a>
        </div>

        
    </div>

    <div class="row mt-2">
        @if ($message=Session::get('success'))
        <span class="alert alert-success">{{$message}}</span>
        @endif
    </div>

    <div class="row mt-5">
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teams as $team)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$team->name}}</td>
                        <td>{{$team->role->name}}</td>
                        <td>{{$team->department->name}}</td>
                        <td>{{$team->email}}</td>
                        <td>{{$team->phone}}</td>
                      

                        

                        
                        <td><a href="{{route('teams.edit',$team->id)}}" class="btn btn-info" >Edit</a></td>

                        <td data-url="{{route('teams.destroy',$team->id)}}"><button class="btn btn-danger btn-delete">Delete</button></td>
                        

                    </tr>

                    @empty
                    <tr>
                        <td colspan="4"><span class="text-danger">No Category Data</span></td>
                    </tr>
                </tbody>
                @endforelse
            </table>
        </div>
        
    </div>
    
</div>

</div>

@endsection