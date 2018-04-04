@extends('layouts.app');
@section('content')

    @if(count($errors))
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $message)

                    <li>{{$message}}</li>
                @endforeach
            </ul>

        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('emis/'.$emission->id)}}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Nom Emission</label>
                        <input type="text" name="nom" class="form-control" value="{{$emission -> nom }}">
                    </div>

                    <div class="form-group">
                        <label for="">Type Emission</label>
                        <input type="text" name="type" class="form-control" value="{{$emission -> type }}">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-danger" value="modifier">
                    </div>

                </form>
            </div>
        </div>

    </div>


@endsection
