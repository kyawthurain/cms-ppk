@extends ('layouts.master')

@section('content')

<div id="wrapper">

<div class="container">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <form action="{{route('departments.store')}}" method="post">
        @csrf
            <div>
                <label for="" class="form-label">Department Code</label>
                <input type="text" name="code" id="" class="form-control">
                @error('code')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div>
                <label for="" class="form-label">Department Name</label>
                <input type="text" name="name" id="" class="form-control">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div>
                <label for="" class="form-label">Phone</label>
                <input type="text" name="phone" id="" class="form-control">
                @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            
            <div class="mt-3">
                <button class="btn btn-success">Add Department</button>
            </div>
            </form>
        </div>
    </div>
</div>

</div>


@endsection