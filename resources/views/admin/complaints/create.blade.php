@extends ('layouts.master')

@section('content')

<div id="wrapper">

<div class="container">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <form action="{{route('complaints.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
            <label for="" class="form-label">Name</label>
                <input type="text" name="name" id="" class="form-control">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <input type="checkbox" name="anonymous" id="" value="anonymous" class="form-check-input">
                <label for="" class="form-label">Anonymous</label>
            </div>
        </div>
            <div>
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" id="" class="form-control">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            

            <div>
                <label for="" class="form-label">Type</label>
                <select name="category_id" id="" class="form-control">
                    <option value="">No Type</option>

                   @foreach ($categories as $category)

                   <option value="{{$category->id}}">{{$category->name}}</option>
                   
                   @endforeach

                </select>
            </div>

            <div>
                <label for="" class="form-label">Role</label>
                <select name="role_id" id="" class="form-control">
                    <option value="">No Role</option>

                    @foreach ($roles as $role)

                   <option value="{{$role->id}}">{{$role->name}}</option>
                   
                   @endforeach

                </select>
            </div>

            <div>
                <label for="" class="form-label">Department</label>
                <select name="depatment_id" id="" class="form-control">
                    <option value="">No Department</option>

                    @foreach ($departments as $department)

                   <option value="{{$department->id}}">{{$department->name}}</option>
                   
                   @endforeach

                </select>
            </div>

            <div>
                <label for="" class="form-label">Title</label>
                <input type="text" name="title" id="" class="form-control">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div>
                <label for="" class="form-label">Description</label>
                <textarea type="email" name="description" id="" class="form-control"></textarea>
                @error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div>
                <label for="" class="form-label">File</label>
                <input type="file" name="files[]" id="" class="form-control-file" multiple>
                @error('files')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mt-3">
                <button class="btn btn-success">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

</div>


@endsection