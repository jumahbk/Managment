@extends('layouts.com')

@section('content')
    <?php
    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>




