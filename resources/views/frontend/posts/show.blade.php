@extends('frontend.layouts.app')

@section('content')

<section class="bg-slate-100 py-20">
    <div class="max-w-7xl mx-auto px-6">
        <x-ui.post-card-detail :post="$post"/>
    </div>
</section>

@endsection