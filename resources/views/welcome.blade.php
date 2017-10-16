@extends('layouts/home')


@section('content')

    <div class="center">
        <div class="text-center">
            <h1>TrialX</h1>
            <p>
                TrialX helps college students find short term paid internship at leading companies in their degree field.  The process is simple with tips for interviews and a resume builder to help students get ready for the corporate environment.
            </p>


            @auth
                @if (Auth::user()->role === 'employee' Or Auth::user()->role === 'student' Or Auth::user()->role === 'administrator')
                    <button type="button" class="button"><a href="/map">Map</a></button>
                    <button type="button" class="button"><a href="/account">View Account</a></button>
                    <button type="button" class="button"><a href="/edit/account">Edit Account</a></button>
            @endauth
                @else
                    <button type="button" class="button"><a href="/login">Login</a></button>
                    <button type="button" class="button"><a href="/register">Register</a></button>
                @endif


        </div>
    </div>


