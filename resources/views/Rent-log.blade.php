@extends('layouts.mainLayout')
@section('title', 'Rent logs')
@section('content')
    <h1 class="font-bold my-5 text-3xl text-slate-800">#Rent logs</h1>
    <x-rent-log-table :rentLogs="$rentLogs" />
@endsection