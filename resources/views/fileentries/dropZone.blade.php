@extends('app')
@section('titulo')Subir archivo @endsection
@section('scriptEspecial')
    <script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
@endsection

@section('content')
    <form action="{!!route('addentry', [])!!}" class="dropzone"></form>

@endsection
