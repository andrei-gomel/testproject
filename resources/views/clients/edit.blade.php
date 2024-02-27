@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('update', $item->id) }}">
    @method("patch")
    @csrf
   <div class="container">
      @php  /** @var  \Illuminate\Support\ViewErrorBag  $errors */  @endphp

      @if($errors->any())
         <div class="row justify-content-center">
            <div class="col-md-11">
               <div class="alert alert-danger" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">x</span>
                  </button>
                  {{ $errors->first() }}
               </div>
            </div>
         </div>
      @endif

      @if(session('success'))
         <div class="row justify-content-center">
            <div class="col-md-11">
               <div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">x</span>
                  </button>
                  {{ session()->get('success')}}
               </div>
            </div>
         </div>
      @endif
      <div class="row justify-content-center">
         <div class="col-md-8">
            @include('clients.includes.item_edit_main_col')
         </div>
      </div>
   </div>
</form>
@endsection
