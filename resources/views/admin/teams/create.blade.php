@extends ('layouts.master')

@section('content')

<div id="wrapper">

<div class="container">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <form action="{{route('teams.store')}}" method="post">
        @csrf
            <div>
                <label for="" class="form-label">Team Name</label>
                <input type="text" name="name" id="" class="form-control">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div>
                <label for="" class="form-label">Role</label>
                <select name="role_id" id="" class="form-control">
                    <option value="">No Role</option>

                    @foreach ($troles as $trole)

                    <option value="{{$trole->role_id}}">{{$trole->role->name}}</option>
                    
                    @endforeach

                </select>
            </div>

            <div>
                <label for="" class="form-label">Department</label>
                <select name="depatment_id" id="" class="form-control">
                    <option value="">No Department</option>

                    @foreach ($troles as $trole)

                    <option value="{{$trole->depatment_id}}">{{$trole->department->name}}</option>
                    
                    @endforeach

                </select>
            </div>

            <div>
                <label for="" class="form-label">Team Email</label>
                <input type="email" name="email" id="" class="form-control">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div>
                <label for="" class="form-label">Team Phone</label>
                <input type="text" name="phone" id="" class="form-control">
                @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mt-3">
                <button class="btn btn-success">Add Team</button>
            </div>
            </form>
        </div>
    </div>
</div>

</div>


@endsection