@extends('layout')

@section('contents')
    <h2 class="text-center py-4">Настройки</h2>
    <h4>Запрос для получения данных!</h4>
    <div class="col py-4">
        <form id="formSetCharCodes">
            <input type="submit" value="Отправить" class="btn btn-danger">
        </form>
    </div>
    <hr>
    <h4>Вывод</h4>
    <div class="row py-4">
        <div class="col">
            <form action="{{ route('getSettingsResult') }}" method="POST">
                @csrf
                <div class="col">
                    <label for="char_code">Валюты <code>Перечислить через пробел!</code>  AUD AZN GBP и т.д.</label>
                    <input
                    id="char_codes"
                    type="text" class="form-control"
                    placeholder="Например: AUD AZN AMD"
                    aria-label="char_code"
                    name="char_code">
                </div>
                <div class="col py-4">
                    <input id="submit" type="submit" value="Выполнить" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $('#formSetCharCodes').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: '{{ route('setXml') }}',
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success:function (response) {
                    // console.log(response);
                    window.location.replace("{{ route('index') }}");
                }
            });
        });
    </script>
@endsection
