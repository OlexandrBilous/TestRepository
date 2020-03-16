<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<div class="container">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
<form method="post" action="{{ route('saveTarif') }}">
    <div>
        <h3>Добавление тарифа</h3>
        <div class="form-group">
            <input type="number" class="form-control {{$errors->has('period') ? 'is-invalid' : ''}}" name="period"
                   placeholder="Период" value="{{old('period')}}"
                   aria-label="Username" aria-describedby="addon-wrapping">
            @error('period')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="number" class="form-control {{$errors->has('percent') ? 'is-invalid' : ''}}" name="percent"
                   placeholder="Процент" value="{{old('percent')}}"
                   aria-label="Username" aria-describedby="addon-wrapping">
            @error('percent')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="number" class="form-control {{$errors->has('month_pay') ? 'is-invalid' : ''}}" name="month_pay"
                   placeholder="Оплата за месяц" value="{{old('month_pay')}}"
                   aria-label="Username" aria-describedby="addon-wrapping">
            @error('month_pay')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="number" class="form-control {{$errors->has('body_pay') ? 'is-invalid' : ''}}" name="body_pay"
                   placeholder="Оплата целиком" value="{{old('body_pay')}}"
                   aria-label="Username" aria-describedby="addon-wrapping">
            @error('body_pay')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <select class="form-control" name="bank_id">
                @foreach($bank as $bank)
                <option value="{{ $bank->id }}">{{$bank->bank_name}}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group">
            <select class="form-control" name="credit_type_id">
                @foreach($credit_type as $credit_type)
                    <option value="{{ $credit_type->id }}">{{$credit_type->credit_type_name}}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input class="btn btn-primary" type="submit" value="Добавить тариф">
    </div>
    </div>
</form>
</div>
<div class="container">
<a class="btn btn-success" href="http://bankproject.ua" role="button">Назад</a>
</div>
</html>
