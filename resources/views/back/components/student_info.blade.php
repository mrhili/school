<strong><i class="fa fa-book margin-r-5"></i> Ecole</strong>

<p class="text-muted">
  {{ GetSetting::getConfig( 'name' ) }}
</p>

<hr>

<strong><i class="fa fa-book margin-r-5"></i> Class</strong>

<p class="text-muted">{{  Auth::user()->the_class->name }}</p>

<hr>
