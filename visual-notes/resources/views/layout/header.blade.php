<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Visual Notes</title>
    <link rel="icon" href="{{ asset('assets/images/visual-notes-favi.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    
    @foreach (getGlobalAssets('css') as $path)
    {!! sprintf('<link rel="stylesheet" href="%s">', asset($path)) !!}
@endforeach

@foreach (getVendors('css') as $path)
    {!! sprintf('<link rel="stylesheet" href="%s">', asset($path)) !!}
@endforeach

@foreach (getCustomCss() as $path)
    {!! sprintf('<link rel="stylesheet" href="%s">', asset($path)) !!}
@endforeach

@stack('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div id="app" class="position-relative">

    
   
