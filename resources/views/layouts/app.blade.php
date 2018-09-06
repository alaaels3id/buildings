<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ GetSettings('sitename') }}  ||  @yield('title')</title>
    {{ Html::style('one/css/bootstrap.min.css') }}
    {{ Html::style('one/css/font-awesome.min.css') }}
    {{ Html::style('one/css/style.css') }}
    {{ Html::script('one/js/jquery.min.js') }}
    {{ Html::script('one/js/load.js') }}
    {{ Html::style('one/css/hover.css') }}
    {{ Html::style('one/css/flexslider.css') }}
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    @yield('style')
</head>
<body>
    @include('inc.header')
    
    @include('admin.layout.message')
    @yield('content')
    
    @include('inc.script')
    
    @yield('footer')
    
    @yield('script')
</body>
</html>