@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Restoranas</div>

                    <div class="card-body">

                        <form method="POST" action="{{ isset($restaurant)?route('restaurant.update',$restaurant->id):route('restaurant.store') }}">
                            @csrf

                            @if (isset($restaurant))
                                @method('put')
                            @endif

                            <div class="mb-3">
                                <label class="form-label">Pavadinimas</label>
                                <input type="text" name="name" class="form-control" value="{{ isset($restaurant)?$restaurant->name:'' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Adresas</label>
                                <input type="text" name="address" class="form-control"  value="{{ isset($restaurant)?$restaurant->address:'' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Miestas</label>
                                <input type="text" name="city" class="form-control"  value="{{ isset($restaurant)?$restaurant->city:'' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Darbo valandos</label>
                                <input type="text" name="work_hours" class="form-control"  value="{{ isset($restaurant)?$restaurant->work_hours:'' }}">
                            </div>

                            <button type="submit" class="btn btn-success">{{ isset($restaurant)?'Išsaugoti':'Pridėti' }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
