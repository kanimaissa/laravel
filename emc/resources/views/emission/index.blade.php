@extends ('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session() ->  has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
                @endif
                <h1>La liste des emissions</h1>
                <div class="pull-right">
                    <a href="{{(url('emis/create')}}" class="btn btn-success">Nouvelle Emission</a>
                </div>
                <table class="table">
                    <head>
                        <tr>
                            <th>Nom</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </head>
                    <body>
                    @foreach($emis as $emission)
                        <tr>
                            <td> {{ $emission -> nom }} </td>
                            <td> {{ $emission -> type }} </td>
                            <td> {{ $emission -> created_at }} </td>
                            <td>

                                <form action="{{url('emis/'.$emission ->id)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                    <a href="{{url('emis/'.$emission ->id.'/show')}}" class="btn btn-primary">Details</a>
                                    <a href="{{url('emis/'.$emission ->id.'/edit')}}" class="btn btn-default">Editer</a>
                                    <button type="submit" class="btn btn-danger">Suprimer</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </body>

                </table>
                {{$emis->links()}}
            </div>
        </div>
    </div>
@endsection