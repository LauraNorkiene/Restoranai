@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Patiekalai</div>

                    <div class="card-body">
                        <a href="{{ route('dishes.create') }}" class="btn btn-success">Pridėti naują</a>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Pavadinimas</th>
                                <th>Kaina</th>
                                <th>Nuotrauka</th>
                                <th>Restoranas</th>
                                <th colspan="2">Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dishes as $dish)
                                <tr>
                                    <td>{{ $dish->name }}</td>
                                    <td>{{ $dish->price }}</td>
                                    <td>
                                        @if ($dish->photo!=null)
                                            <img src="{{ route('image.dishImage',$dish->id) }}" style=" width: 200px;">
                                        @endif
                                    </td>
                                    <td>{{ $dish->restaurant->name }}</td>
                                    <td>
                                        <a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-success">Redaguoti</a>


                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('dishes.destroy', $dish->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button  class="btn btn-danger">Ištrinti</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
