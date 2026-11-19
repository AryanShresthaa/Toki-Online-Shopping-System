@extends('layouts.layout')
@section('body')

<x-products.products :p="$products" :categories="$categories"/>
@endsection