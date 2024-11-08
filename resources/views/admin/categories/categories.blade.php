@extends ('layouts.master')

@section('content')

<div id="content">

<div class="container">
    <div class="row mt-5">
        <div class="col-md-2">
            <a href="{{route('categories.create')}}" class="btn btn-dark">Add New Category</a>
        </div>

        <div class="col-md-2">
            <a href="{{route('categories.restore')}}" class="btn btn-dark">Restore All</a>
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
                        <th>Category</th>
                        <th>Parent Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$category->name}}</td>

                        @if ($category->parent == null)
                            <td>-</td>
                        @else
                        <td>{{$category->parent->name}}</td>
                        @endif

                        
                        <td><a href="{{route('categories.edit',$category->id)}}" class="btn btn-info" >Edit</a></td>

                        <td data-url="{{route('categories.destroy',$category->id)}}"><button class="btn btn-danger btn-delete">Delete</button></td>
                        

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
    {{$categories->links()}}
</div>

</div>

@endsection