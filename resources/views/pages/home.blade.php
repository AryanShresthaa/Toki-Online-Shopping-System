@extends('layouts.layout')

@section('body')

<x-banner.banner
    :ba="$banner"
    :comboCategory="$comboCategory" />

<x-category.category :ca="$category"/>

@endsection