@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>
                            <h4>
                                Welcome to Penzi System. Trigger the sending of service activation SMS by clicking the
                                button below.
                            </h4>
                        </div> <br>

                        <div>
                            <a href="{{ route('sms-send') }}" class="button primary">Send SMS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
