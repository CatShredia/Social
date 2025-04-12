@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="error-message">
                    <i class="fas fa-exclamation-triangle error-icon"></i>
                    <h2>Доступ запрещен</h2>
                    <p>У вас нет прав для доступа к этой странице.</p>
                    <a href="/" class="btn btn-primary">Вернуться на главную страницу</a>
                </div>
            </div>
        </div>
    </div>
@endsection
