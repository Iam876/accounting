@extends('layouts.header')
@section('content')
<!-- Main Wrapper -->
<div class="main-wrapper">
			
    <div class="error-box">
        <h1>Access Denied</h1>
        <h3 class="h2 mb-3"><i class="fas fa-exclamation-circle"></i> Oops! Something went wrong</h3>
        <p class="h4 font-weight-normal">Your access has been blocked because you are using a VPN or proxy.</p>
        <a href="index.html" class="btn btn-primary">Back to Home</a>
    </div>

</div>
<!-- /Main Wrapper -->
@endsection