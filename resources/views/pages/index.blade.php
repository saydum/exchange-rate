@extends('layout')

@section('contents')
    @foreach($valutes as $val)
            <div class="col-sm-4 py-4">
                <div class="card border-primary mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h4 class="card-title">{{ $val->char_code }}</h4>
                        <p class="card-text">{{ $val->name }}</p>
                        <hr>
                        Курс:
                        <p>
                            <span class="text-primary" style="font-size: 24px">
                                {{ $val->valute }}</span>
                            РУБ
                        </p>

                        <hr>
                        <p>Номинал:
                            <b>
                                    {{ $val->nominal }}
                            </b>
                        </p>
                    </div>
                </div>
            </div>
    @endforeach
@endsection
