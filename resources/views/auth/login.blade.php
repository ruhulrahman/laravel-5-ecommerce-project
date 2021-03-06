@extends('layouts.madre')

@section('titulo', 'Iniciar Sesión')
@stop

@section('iniciar_sesion')
<div id="sns_content" class="wrap layout-m">
    <div class="container">
      <div class="row">
        <div id="sns_main" class="col-md-12 col-main">
          <div id="sns_mainmidle">
            <div class="account-login">
              <div class="page-title">
                <h1>Registrate o Inicia sesión</h1>
              </div>
			<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

                <input name="form_key" type="hidden" value="YI43JcRMPlZ5bHvi">
                <div class="col2-set">
                  <div class="col-1 new-users">
                    <div class="content">
                      <h2>Nuevo Usuario</h2>
                      <p>Al crear una cuenta en nuestra pagina, usted será capaz de moverse a través del proceso de pujas de forma rápida, almacenar direcciones de envío, ver y realizar un seguimiento de sus subastas y articulos subastados de su cuenta y más.</p>
                    </div>
                  </div>
                  <div class="col-2 registered-users">
                    <div class="content">
                      <h2>Usuario Registrado</h2>
                      <p>Si tienes una cuenta con nosotros, por favor inicia sesión.</p>
                      <ul class="form-list">
                        <li>
                          <label for="email" class="required"><em>*</em>Email de Usuario</label>
                          <div class="input-box">
                            <input type="email" name="email" value="" id="email" class="input-text required-entry validate-email" title="Email De Usuario" value="{{ old('email') }}">
                          </div>
                        </li>
                        <li>
                          <label for="password" class="required"><em>*</em>Contraseña</label>
                          <div class="input-box">
                            <input type="password" name="password" class="input-text required-entry validate-password" id="password" title="Contraseña">
                          </div>
                        </li>
                        <li>
                          <input type="checkbox" name="remember"> Recordar campos
                        </li>

                      </ul>
                      <p class="required">* Campos requeridos</p>
                    </div>
                    @if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
                  </div>
                </div>
                <div class="col2-set">
                  <div class="col-1 new-users">
                    <div class="buttons-set">
                      <a type="button" href="{{ url('/auth/register') }}"title="Create an Account" class="button" onclick="">Registrar Nuevo Usuario</a>
                    </div>
                  </div>
                  <div class="col-2 registered-users">
                    <div class="buttons-set"> <a href="{{ url('/password/email') }}" class="f-left">Olvidaste tu contraseña?</a>
                      <button type="submit" class="button" title="Login" name="send" id="send2">Iniciar Sesión</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection