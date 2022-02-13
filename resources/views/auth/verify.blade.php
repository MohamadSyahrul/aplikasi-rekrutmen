{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layout.master2')
@section('title')
Verifikasi Email
@endsection
@section('content')
<div
    class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
        {{ __('Verify Your Email Address') }}
    </h2>
    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">Selamat Datang di Aplikasi Rekrutmen Pegawai CV Juna Network Indonesia</div>
    <div class="card">

        <div class="card-body">
            @if (session('resent'))
                <div class="rounded-md px-5 py-4 mb-2 bg-theme-9 text-white" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="text-theme-10">{{ __('click here to request another') }}</button>.
            </form>
        </div>
    </div>

</div>
@endsection
