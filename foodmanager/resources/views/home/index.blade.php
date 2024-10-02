@extends('layouts.app')

@section('main')



@endsection

@push('css')

    <link rel="stylesheet" href="{{ asset('Homestyles.css') }}">
@endpush

@push('js')

    <script src="{{ asset('js/Home.js') }}"></script>
    <script src="{{ asset('js/Homescripts.js') }}"></script>

@endpush
