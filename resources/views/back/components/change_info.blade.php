{!! Form::model(Auth::user(),[ 'method' => 'post', 'route'=> ['users.change-info', Auth::id() ], 'class' => 'form-horizontal' ]) !!}

    {{ csrf_field() }}



    @include('back.partials.formG', ['name' => 'city', 'type' => 'text', 'text' => 'Ville', 'class'=>'', 'required' => false,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'zip_code', 'type' => 'text', 'text' => 'Zip Code', 'class'=>'', 'required' => false,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'adress', 'type' => 'text', 'text' => 'Adress', 'class'=>'', 'required' => false,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'phone', 'type' => 'tel', 'text' => 'Phone', 'class'=>'', 'required' => false,'additionalInfo' => []])

    @if( Auth::user()->role >= 2)

      @include('back.partials.formG', ['name' => 'phone2', 'type' => 'tel', 'text' => 'Phone 2', 'class'=>'', 'required' => false,'additionalInfo' => []])
      @include('back.partials.formG', ['name' => 'phone3', 'type' => 'tel', 'text' => 'Phone 3', 'class'=>'', 'required' => false,'additionalInfo' => []])
      @include('back.partials.formG', ['name' => 'fix', 'type' => 'tel', 'text' => 'Phone fix', 'class'=>'', 'required' => false,'additionalInfo' => []])

    @endif

    @include('back.partials.formG', ['name' => 'whatsapp', 'type' => 'tel', 'text' => 'whatsapp', 'class'=>'', 'required' => false,'additionalInfo' => []])
    @if( Auth::user()->role >= 2)
      @include('back.partials.formG', ['name' => 'family_situation', 'type' => 'checkbox', 'text' => 'La situation familiale si Marié?', 'class'=>'', 'required' => false, 'checked' => false,'additionalInfo' => []])


    @endif
    @if( Auth::user()->role == 2 )
      @include('back.partials.formG', ['name' => 'profession', 'type' => 'text', 'text' => 'Profession', 'class'=>'', 'required' => false,'additionalInfo' => []])
    @endif

    {{ $slot }}

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-danger">Submit</button>
    </div>
  </div>
{!! Form::close() !!}
