<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<h1>Кредитная сетка</h1>
<div class="container">
<a class="btn btn-secondary" href="http://bankproject.ua/addTarif" role="button">Добавить новый тариф</a>
    <a class="btn btn-secondary" href="http://bankproject.ua/addBank" role="button">Добавить новый банк</a>
    <a class="btn btn-secondary" href="http://bankproject.ua/addCredit_type" role="button">Добавить новый тип кредитования</a>
    <a class="btn btn-secondary" href="http://bankproject.ua" role="button">Отобразить полную сетку</a>
    </div>
        <div class="container">
@isset($param)
    <h2>Сортировка по запросу: {{ $param }}</h2>
@endisset
<table class="table table-dark">
    <tr>
        <th>Банк</th>
        <th>Тип кредитования</th>
        <th>Период</th>
        <th>Плата за месяц</th>
        <th>Единовременная плата</th>
        <th>Процент</th>
    </tr>
    @foreach($tarif as $tarif)
        <tr>

            <td>{{$tarif->bank->bank_name}}</td>
            <td>{{$tarif->credit_type->credit_type_name}}</td>
            <td>{{$tarif->period}}</td>
            <td>{{$tarif->month_pay}}</td>
            <td>{{$tarif->body_pay}}</td>
            <td>{{$tarif->percent}}</td>

        </tr>
    @endforeach
</table>
</div>
<div class="container">
<h2>Поиск по фильтру</h2>
<form  name="postForm" method="GET" action="{{ route('filterTraif') }}">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Фильтровать по:</label>
        <select name="variables" class="form-control" id="exampleFormControlSelect1">
            <option  value='1'>Граничному периоду</option>
            <option  value='2'>Проценту</option>
            <option  value='3'>Оплате за месяц</option>
            <option  value='4'>Оплате целиком</option>
            <option  value='5'>Названию банка</option>
            <option  value='6'>Типу кредита</option>
        </select>
    </div>
    <input class="form-control"    name="filter"><br>
    <input class="form-control"  type="submit" >
</form>
        </div>
    </div>
</div>
{{--<div class="container">--}}
{{--<a class="btn btn-primary" href="http://bankproject.ua/addTarif" role="button">Добавить новый тариф для банка</a>--}}
{{--    </div>--}}
</html>
