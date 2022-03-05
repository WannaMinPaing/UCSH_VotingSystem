@extends('frontend.layouts.app')
@section('title','UCSH')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <h1>hiiiiiiiiiiiiiii</h1>
                <p>An element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:n element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled:</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

$(document).ready(function(){
     $("#nav_home").css({"background-color": "red", "border-bottom-left-radius": "20px","border-top-right-radius":"20px","width":"70px"});
});

</script>
@endsection
