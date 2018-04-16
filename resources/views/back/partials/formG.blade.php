



                <div class="form-group">
                  <label for="{{ $name }}" class="col-sm-2 control-label"> {{ $text }} </label>

                  <div class="col-sm-10">




                    @if( $type == 'number' )


                        {!! Form::number($name, null, ['class' => 'form-control '. $class, 'required' => $required ]) !!}

                    @elseif( $type == 'text' )


                        {!! Form::text($name, null, ['class' => 'form-control '. $class, 'required' => $required ]) !!}

                    @elseif( $type == 'tel' )


                        {!! Form::tel($name, null, ['class' => 'form-control '. $class, 'required' => $required ]) !!}



                    @elseif( $type == 'email' )


                        {!! Form::email($name, null, ['class' => 'form-control '. $class, 'required' => $required ]) !!}

                    @elseif( $type == 'date' )


                        {!! Form::date($name, null, ['class' => 'form-control '. $class, 'required' => $required ]) !!}


                    @elseif( $type == 'textarea' )


                        {!! Form::textarea($name, null, ['class' => 'form-control '. $class, 'required' => $required ]) !!}

                    @elseif($type == 'select')

                        {!! Form::select($name, $array, null , [ 'class' => 'form-control'.$class, 'required' => $required ]) !!}

                    @elseif( $type == 'file' )

                    	{!! Form::file($name, null , ['class' => 'form-control ']) !!}

                        <div class="text-center">

                                <img src="{{ \App\Helpers\Config\Setting::ifImg( $name ) }}" class="img-responsive" width="30%"/>


                        </div>

                        

                    @endif


                  </div>
                </div>
                        

                    @if ($errors->has($name))
                        <span class="help-block">
                            <strong>{{ $errors->first( $name ) }}</strong>
                        </span>
                    @endif


                    @if( $type == 'file' )

                        

                    @endif


