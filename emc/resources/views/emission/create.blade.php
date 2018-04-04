@extends('layouts.app');
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('emis')}}" method="post" encrypte="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group @if($errors ->get('nom'))has-error @endif">
                        <label for="">Nom Emission</label>
                        <input type="text" name="nom" class="form-control" value="{{old('nom')}}">
                        @if($errors -> get('nom'))
                            @foreach($errors ->get('nom') as $message)
                            <li>{{$message}}</li>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group @if($errors ->get('type'))has-error @endif">
                        <label for="">Type Emission</label>
                        <input type="text" name="type" class="form-control" value="{{old('type')}}">
                        @if($errors -> get('type'))
                            @foreach($errors ->get('type') as $message)
                                <li>{{$message}}</li>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input class="form-control" type="file" name="photo">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" value="enregistrer">
                    </div>

                </form>
            </div>
        </div>

    </div>


    @endsection