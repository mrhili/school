{!! Form::open(['route' => 'contacts.send','method' => 'post' ,'class' => 'form-horizontal']) !!}


@if(Auth::guest())

  @include('back.partials.formG', ['name' => 'name', 'type' => 'text', 'text' => 'Nom complet', 'class'=>'', 'required' => true,'additionalInfo' => []])


  @include('back.partials.formG', ['name' => 'tel', 'type' => 'tel', 'text' => 'Telephone', 'class'=>'', 'required' => true,'additionalInfo' => []])


  @include('back.partials.formG', ['name' => 'email', 'type' => 'email', 'text' => 'Email', 'class'=>'', 'required' => false,'additionalInfo' => []])

@endif

@include('back.partials.formG', ['name' => 'body', 'type' => 'text', 'text' => 'Message', 'class'=>'', 'required' => true,'additionalInfo' => []])

<input type="cancel" class="btn btn-warning" value="Anulé" />
<input type="reset" class="btn btn-danger" value="Suprimé" />
<input type="submit" class="btn btn-primary pull-right" value="Envoyé" />


{!! Form::close() !!}
