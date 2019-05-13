@extends('layouts.master')
@section('content')

    <section class="qrCode-wrapper">
        <div class="container">
            <div class="visible-print text-center">
                <h1>Laravel 5.7 - QR Code Generator Example</h1>
                @if(isset($qrCode))
                    {!! $qrCode !!}
                @endif
            </div>
        </div>
    </section>
@endsection
