@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifikasi alamat email Anda') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </div>
                    @endif
                    {{ __('Sebelum melanjutkan, harap periksa email Anda untuk tautan verifikasi.') }}
                    <p>Cek folder <b>Inbox atau SPAM</b> untuk email verifikasi. Terima kasih.</p>
                    {{ __('Jika Anda tidak menerima email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('kirim permintaan ulang') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
