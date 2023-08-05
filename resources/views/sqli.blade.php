@extends('layouts.template')

@section('title')
    SQLインジェクション
@endsection('title')

@section('level')
    <span style="color: red;">高</span>
@endsection

@section('damage-list')
    <li>情報漏洩、改ざん、妨害</li>
@endsection

@section('example')
    ' or 1 = 1 or ';
@endsection

@section('bad-cont')
    <p>ユーザー名: badtaro　パスワード: taro</p>
    <p>ログインしてください</p>
    <form action="{{ route('post_sqli') }}" method="post">
        @csrf
        <p>ユーザー名</p>
        <input type="text" name="name">
        <p>パスワード</p>
        <input type="password" name="passwd">
        <input type="hidden" value="unmeasured" name="measures">
        <input type="submit" value="ログイン">
    </form>
    @isset ( $measures )
        @if ( $measures === 'unmeasured' )
            {{ $result }}
        @endif
    @endisset
@endsection

@section('good-cont')
    <p>ユーザー名: goodhanako　パスワード: hanako</p>
    <p>ログインしてください</p>
    <form action="{{ route('post_sqli') }}" method="post">
        @csrf
        <p>ユーザー名</p>
        <input type="text" name="name">
        <p>パスワード</p>
        <input type="password" name="passwd">
        <input type="hidden" value="remedied" name="measures">
        <input type="submit" value="ログイン">
    </form>
    @isset ( $measures )
        @if ( $measures === 'remedied' )
            {{ $result }}
        @endif
    @endisset
@endsection

@section('link')
    <p><a href="{{ route('home') }}">ホームへ</a></p>
@endsection