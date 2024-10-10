@extends('visitors.layout')

@section('content')

    <section class="pageContent">
        <div class="container">
            <h1>Payment Failed!</h1>
            <p>Something went wrong with your payment. Please try again.</p>

            <p><strong>Reason: </strong> {!! $error !!}</p>
            <a href="{{ url('/') }}" class="btn btn-primary">Go to Home</a>
        </div>
    </section>
@endsection
