@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Restoranai</div>

                    <div class="card-body">
                        <a href="{{ route('restaurant.create') }}" class="btn btn-success">Pridėti naują</a>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Pavadinimas</th>
                                <th>Miestas</th>
                                <th>Adresas</th>
                                <th>Darbo valandos</th>
                                <th></th>
                                <th colspan="2">Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($restaurants as $restaurant)
                                <tr>
                                    <td>{{ $restaurant->name }}</td>
                                    <td>{{ $restaurant->city }}</td>
                                    <td>{{ $restaurant->address }}</td>
                                    <td>{{ $restaurant->work_hours }}</td>

                                    <td>
                                        <a href="{{ route('restaurantDishes',$restaurant->id) }}" class="btn btn-success">Patiekalai</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('restaurant.edit', $restaurant->id) }}" class="btn btn-success">Redaguoti</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('restaurant.destroy', $restaurant->id) }}">
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
