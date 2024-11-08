@extends ('layouts.master')

@section('content')

<div id="wrapper">

<div class="container">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <form action="{{route('categories.store')}}" method="post">
        @csrf
            <div>
                <label for="" class="form-label">Category Name</label>
                <input type="text" name="name" id="" class="form-control">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div>
                <label for="" class="form-label">Parent Category</label>
                <select name="parent_id" id="" class="form-control">
                    <option value="">No Parent</option>

                    @foreach ($parents as $parent)

                    <option value="{{$parent->id}}">{{$parent->name}}</option>
                    
                    @endforeach

                </select>
            </div>
            <div class="mt-3">
                <button class="btn btn-success">Add Category</button>
            </div>
            </form>
        </div>
    </div>
</div>

</div>


@endsection