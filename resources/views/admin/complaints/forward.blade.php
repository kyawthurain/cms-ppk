@extends ('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">

            <form action="{{route('complaints.send')}}"  method="post">
                @csrf
                <input type="hidden" name="complaint" id="" value="{{$complaint->id}}">
            <div class="card">
                <div class="card-header">
                    <h4>{{$complaint->title}}</h4>
                </div>
                <div class="card-body">
                    <p>{{$complaint->description}}</p>

                @foreach ($team as $member)

                <input type="checkbox" name="members[{{$member->id}}]" id="" value="{{$member->id}}">{{$member->name}}
                <br>
                @endforeach
                </div>
                <div class="card-footer">
                        <button class="btn btn-primary">Submit</button>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>

@endsection
