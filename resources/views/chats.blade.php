@extends('layouts.madre')


@section('titulo', 'Chats')
@stop

@section('extclases')
<!-- ESTILO CHAT -->
<link href="{{ url('css/chat.css') }}" rel="stylesheet">

@stop

@section('chats')

<div id="wrapper">
	<div class="message-container">
		<div class="message-north">
			<ul class="message-user-list">
				@foreach($mensajesEnviados as $mensajeEnviado)
				<li>
					<a class="userChat" onClick="cargarChatsEmisor({{ $mensajeEnviado->id }});">
						<span class="user-img"><img src='{{ url('images/profiles/'.$mensajeEnviado->imgperf) }}'/></span>
						<span class="user-title">{{ $mensajeEnviado->titulo }}</span>
						<p class="user-desc">{{ $mensajeEnviado->username }}</p>
					</a>
				</li>
				@endforeach
				@foreach($mensajesRecibidos as $mensajeRecibido)
				<li>
					<a onClick="cargarChatsReceptor({{ $mensajeRecibido->id }});">
						<span class="user-img"><img src='{{ url('images/profiles/'.$mensajeEnviado->imgperf) }}'/></span>
						<span class="user-title">{{ $mensajeRecibido->titulo }}</span>
						<p class="user-desc">{{ $mensajeRecibido->username }}</p>
					</a>
				</li>
				@endforeach
			</ul>

			<div class="message-thread">
				selecciona un chat para empezar...
				<!-- <div class="message bubble-right">
					<label class="message-user">Jack Johnson</label>
					<label class="message-timestamp">2 Hours Ago</label>
					<p>;-)</p>
				</div>
				<div class="message bubble-left">
					<label class="message-user">Bryan Adams</label>
					<label class="message-timestamp">2 Hours Ago</label>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus. Donec at lorem eget sapien iaculis porttitor id quis ligula feugiat nunc ut nibh justo eget elit aliquet interdum tempus.</p>
				</div> -->
			</div>
		</div>
		<div class="message-south">
			<textarea cols="20" rows="3"></textarea>
			<button>Send</button>
		</div>
	</div>
</div>
@stop

@section('extrascripts')
<script>
	function cargarChatsEmisor(idChat){
		$.getJSON("{{ url('get_conversacion_as_emisor') }}"+"/"+idChat, function(result){
			var scatm = "";
			$.each(result, function(i, field){
				if(field.propietario==1){
					scatm += "<div class='message bubble-right'>";
				} else {
					scatm += "<div class='message bubble-left'>";
				}
				if(field.propietario==1){
					scatm += '<label class="message-user">Yo</label>';
				} else {
					scatm += '<label class="message-user">'+field.usuario+'</label>';
				}
				scatm += '<label class="message-timestamp">'+field.fecha+'</label>';
				scatm += "<p>"+field.mensaje+"</p>";
				scatm += "</div>";
			});
			$(".message-thread").html(scatm);
		});
	}

	function cargarChatsReceptor(idChat){
		$.getJSON("{{ url('get_conversacion_as_receptor') }}"+"/"+idChat, function(result){
			var scatm = "";
			$.each(result, function(i, field){
				if(field.propietario==0){
					scatm += "<div class='message bubble-right'>";
				} else {
					scatm += "<div class='message bubble-left'>";
				}
				if(field.propietario==0){
					scatm += '<label class="message-user">Yo</label>';
				} else {
					scatm += '<label class="message-user">'+field.usuario+'</label>';
				}
				scatm += '<label class="message-timestamp">2 Hours Ago</label>';
				scatm += "<p>"+field.mensaje+"</p>";
				scatm += "</div>";
			});
			$(".message-thread").html(scatm);
		});
	}
</script>
@stop