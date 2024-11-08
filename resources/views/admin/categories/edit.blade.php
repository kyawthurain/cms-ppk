@extends ('layouts.master')

@section('content')

<div id="wrapper">

<div class="container">
    <div class="row mt-5">
        <div class="col-md-2">
            <a href="{{route('categories.index')}}" class="btn btn-dark">Back</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <form action="{{route('categories.update',$category->id)}}" method="post">
                @method('put')
        @csrf
            <div>
                <label for="" class="form-label">Category Name</label>
                <input type="text" name="name" id="" class="form-control" value="{{$category->name}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div>
                <label for="" class="form-label">Parent Category</label>
                <select name="parent_id" id="" class="form-control">

                    <option value="">No Parent</option>

                    @foreach ($parents as $parent)

                    @if ($parent->id == $category->parent_id)
                    <option value="{{$parent->id}}" selected>{{$parent->name}}</option>
                    @else
                    <option value="{{$parent->id}}" >{{$parent->name}}</option>
                    @endif

                   
                    
                    @endforeach

                </select>
            </div>
            <div class="mt-3">
                <button class="btn btn-success">Save Category</button>
            </div>
            </form>
        </div>
    </div>
</div>

</div>


@endsection