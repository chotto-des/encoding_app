@extends('layouts.app')

@section('title', 'Login – Pampanga High School')
	
@push('styles')
    @vite(['resources/css/site_header.css', 'resources/css/site_footer.css'])
@endpush
    
@section('body')
    @include('partials.site_header-guest')


    
    

@endsection
