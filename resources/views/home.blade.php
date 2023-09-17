@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('lang.Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->hasAnyRole('researcher'))
                    <a href="/researcher/researcherpost/')}}"><button>{{ __('lang.GoDashboard') }}</button></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
