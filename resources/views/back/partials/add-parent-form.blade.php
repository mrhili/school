@if (empty( $keyword ))
  @php
  $keyword = '';
  @endphp
@endif


<div class="text-center">
  <h3 >Informations sur parent</h3>
  <p>
    ...
  </p>

</div>
<div class='parent_dont_exist'>
  @include('back.partials.formG', ['name' => 'img'.$keyword, 'type' => 'file', 'text' => 'Image Parent 1', 'class'=>'', 'required' => false ,'additionalInfo' => []])
</div>


@include('back.partials.formG', ['name' => 'name'.$keyword, 'type' => 'text', 'text' => 'Prénom Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])
@include('back.partials.formG', ['name' => 'last_name'.$keyword, 'type' => 'text', 'text' => 'Nom Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])
@include('back.partials.formG', ['name' => 'arabic_name'.$keyword, 'type' => 'text', 'text' => 'Arabic Prénom Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])
@include('back.partials.formG', ['name' => 'arabic_last_name'.$keyword, 'type' => 'text', 'text' => 'Arabic Nom Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])

@include('back.partials.formG', ['name' => 'gender'.$keyword, 'type' => 'select', 'selected' => null , 'text' => 'Genre Parent 1', 'class'=>'parent_dont_exist', 'required' => true, 'array' => ArrayHolder::gender() ,'additionalInfo' => []])


@include('back.partials.formG', ['name' => 'birth_date'.$keyword, 'type' => 'date', 'text' => 'Date de naissance Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])
@include('back.partials.formG', ['name' => 'birth_place'.$keyword, 'type' => 'text', 'text' => 'ville de naissance Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])



@include('back.partials.formG', ['name' => 'cin'.$keyword, 'type' => 'text', 'text' => 'CIN du Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])
@include('back.partials.formG', ['name' => 'profession'.$keyword, 'type' => 'text', 'text' => 'Profession du Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])



@include('back.partials.formG', ['name' => 'family_situation'.$keyword, 'type' => 'checkbox', 'text' => 'La situation familiale du Parent 1, Marié?', 'class'=>'parent_dont_exist', 'required' => false, 'checked' => false,'additionalInfo' => []])





@include('back.partials.formG', ['name' => 'city'.$keyword, 'type' => 'text', 'text' => 'Ville Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])

@include('back.partials.formG', ['name' => 'zip_code'.$keyword, 'type' => 'text', 'text' => 'Code postal Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])
@include('back.partials.formG', ['name' => 'adress'.$keyword, 'type' => 'text', 'text' => 'Adress', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])
@include('back.partials.formG', ['name' => 'phone1'.$keyword, 'type' => 'tel', 'text' => 'Téléphone Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])
@include('back.partials.formG', ['name' => 'phone2'.$keyword, 'type' => 'tel', 'text' => 'Téléphone Parent 2', 'class'=>'parent_dont_exist', 'required' => false,'additionalInfo' => []])
@include('back.partials.formG', ['name' => 'phone3'.$keyword, 'type' => 'tel', 'text' => 'Téléphone Parent 3', 'class'=>'parent_dont_exist', 'required' => false,'additionalInfo' => []])
@include('back.partials.formG', ['name' => 'fix'.$keyword, 'type' => 'tel', 'text' => 'Téléphone Fix', 'class'=>'parent_dont_exist', 'required' => false,'additionalInfo' => []])
@include('back.partials.formG', ['name' => 'whatsapp'.$keyword, 'type' => 'tel', 'text' => 'Whatsapp', 'class'=>'parent_dont_exist', 'required' => false,'additionalInfo' => []])
@include('back.partials.formG', ['name' => 'facebook'.$keyword, 'type' => 'text', 'text' => 'Facebook Link', 'class'=>'parent_dont_exist', 'required' => false,'additionalInfo' => []])

<hr />
<div class="text-center">
  <h3 >Relation entre parent1 et éléve</h3>
  <p>
    ...
  </p>
</div>

@include('back.partials.formG', ['name' => 'categoryship', 'type' => 'select','selected' => null, 'text' => 'Relation entre parent et éléve', 'class'=>'', 'required' => true, 'array' => $categoryships ,'additionalInfo' => []])

<hr />
<div class="text-center">
  <h3 >Parent Login information</h3>
  <p>
    ...
  </p>
</div>


@include('back.partials.formG', ['name' => 'email'.$keyword, 'type' => 'email', 'text' => 'E-mail Parent 1', 'class'=>'', 'required' => true,'additionalInfo' => [  ]])
@include('back.partials.formG', ['name' => 'password'.$keyword, 'type' => 'text', 'text' => 'Password Parent 1', 'class'=>'', 'required' => true,'value' => str_random(6),'additionalInfo' => [  ]])



<hr />
