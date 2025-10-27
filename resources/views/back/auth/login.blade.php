@extends('layouts.auth.app')
@section ('pageTitle',isset($pageTitle) ? $pageTitle : 'Login')
@section('content')

@livewire('auth.login.login')
   
@endsection
