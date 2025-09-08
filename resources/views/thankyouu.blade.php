@extends('layouts.app')
@section('title', 'Thank You')

@section('content')
<style>
    @font-face {
        font-family: 'HolidayFree';
        src: url('{{ asset("assets/fonts/HolidayFree.otf") }}') format('opentype');
        font-weight: normal;
        font-style: normal;
    }

    .thank-you-container {
        font-family: 'HolidayFree', sans-serif;
        min-height: 80vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 2rem;
        background: linear-gradient(135deg, #f0f8ff, #ffffff);
        animation: fadeIn 1.2s ease-in-out;
        margin-top: 100px;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .thank-you-logo {
        max-width: 180px;
        margin-bottom: 20px;
        animation: popIn 1s ease-in-out;
    }

    @keyframes popIn {
        0% { transform: scale(0.8); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }

    .thank-you-icon {
        font-size: 4rem;
        color: #00b1c2; /* نفس لون الجزء الفيروزي في اللوجو */
        margin-bottom: 1rem;
        animation: bounceIn 1s ease-in-out;
    }

    @keyframes bounceIn {
        0% { transform: scale(0.5); opacity: 0; }
        60% { transform: scale(1.1); opacity: 1; }
        100% { transform: scale(1); }
    }

    .thank-you-title {
        font-size: 2.8rem;
        color: #002c6c; /* الأزرق الغامق */
        margin-bottom: 0.5rem;
    }

    .thank-you-message {
        font-size: 1.2rem;
        color: #333;
        max-width: 600px;
        line-height: 1.8;
        animation: fadeIn 1.4s ease-in-out;
        font-family: arial ;
    }
</style>

<div class="thank-you-container">
   
    <img src="{{ asset('https://elsewedy-ind.com/wp-content/uploads/2023/09/logo-2-svg.png') }}" alt="El Sewedy Logo" class="thank-you-logo">

    <i class="fas fa-check-circle thank-you-icon"></i>

    <h1 class="thank-you-title">Thank You!</h1>

     <p class="thank-you-message">
        Applications are now closed.<br>
        Thank you for your interest, and we look forward to seeing you in future training opportunities at <strong>Elsewedy Industries</strong>.
    </p>
</div>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
