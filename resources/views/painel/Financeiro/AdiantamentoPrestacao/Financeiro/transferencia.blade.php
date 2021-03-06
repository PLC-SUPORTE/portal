@extends('painel.Layout.header')
<?php $search = 2 ?>
@section('title') TransferĂȘncia de valor @endsection <!-- Titulo da pagina -->

@section('header') 
   	<link rel="shortcut icon" href="{{ asset('/public/assets/imgs/casinha.png')}}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/public/materialize/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/materialize/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/materialize/css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/materialize/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/materialize/css/data-tables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/materialize/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/materialize/css/app-invoice.min.css') }}">

    <style>
     .span{
        font-weight: bold;
     }
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section, main {
	display: block;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}

.img-replace {
  /* replace text with an image */
  display: inline-block;
  overflow: hidden;
  text-indent: 100%;
  color: transparent;
  white-space: nowrap;
}


.cd-nugget-info {
  text-align: center;
  position: absolute;
  width: 100%;
  height: 50px;
  line-height: 50px;
  bottom: 0;
  left: 0;
}
.cd-nugget-info a {
  position: relative;
  font-size: 14px;
  color: #5e6e8d;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  transition: all 0.2s;
}
.no-touch .cd-nugget-info a:hover {
  opacity: .8;
}
.cd-nugget-info span {
  vertical-align: middle;
  display: inline-block;
}
.cd-nugget-info span svg {
  display: block;
}
.cd-nugget-info .cd-nugget-info-arrow {
  fill: #5e6e8d;
}


.cd-popup-trigger {
  display: block;
  width: 170px;
  height: 50px;
  line-height: 50px;
  margin: 3em auto;
  text-align: center;
  color: #FFF;
  font-size: 14px;
  font-size: 0.875rem;
  font-weight: bold;
  text-transform: uppercase;
  border-radius: 50em;
  background: #35a785;
  box-shadow: 0 3px 0 rgba(0, 0, 0, 0.07);
}
@media only screen and (min-width: 1170px) {
  .cd-popup-trigger {
    margin: 6em auto;
  }
}

.cd-popup {
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  visibility: hidden;
  -webkit-transition: opacity 0.3s 0s, visibility 0s 0.3s;
  -moz-transition: opacity 0.3s 0s, visibility 0s 0.3s;
  transition: opacity 0.3s 0s, visibility 0s 0.3s;
}
.cd-popup.is-visible {
  opacity: 1;
  visibility: visible;
  -webkit-transition: opacity 0.3s 0s, visibility 0s 0s;
  -moz-transition: opacity 0.3s 0s, visibility 0s 0s;
  transition: opacity 0.3s 0s, visibility 0s 0s;
}

.cd-popup-container {
  position: relative;
  width: 90%;
  max-width: 400px;
  margin: 4em auto;
  background: #FFF;
  border-radius: .25em .25em .4em .4em;
  text-align: center;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
  -webkit-transform: translateY(-40px);
  -moz-transform: translateY(-40px);
  -ms-transform: translateY(-40px);
  -o-transform: translateY(-40px);
  transform: translateY(-40px);
  /* Force Hardware Acceleration in WebKit */
  -webkit-backface-visibility: hidden;
  -webkit-transition-property: -webkit-transform;
  -moz-transition-property: -moz-transform;
  transition-property: transform;
  -webkit-transition-duration: 0.3s;
  -moz-transition-duration: 0.3s;
  transition-duration: 0.3s;
}
.cd-popup-container p {
  padding: 3em 1em;
}
.cd-popup-container .cd-buttons:after {
  content: "";
  display: table;
  clear: both;
}
.cd-popup-container .cd-buttons li {
  float: left;
  width: 50%;
  list-style: none;
}
.cd-popup-container .cd-buttons a {
  display: block;
  height: 60px;
  line-height: 60px;
  text-transform: uppercase;
  color: #FFF;
  -webkit-transition: background-color 0.2s;
  -moz-transition: background-color 0.2s;
  transition: background-color 0.2s;
}
.cd-popup-container .cd-buttons li:first-child a {
  background: #b6bece;
  border-radius: 0 0 0 .25em;
}
.no-touch .cd-popup-container .cd-buttons li:first-child a:hover {
  background-color: #fc8982;
}
.cd-popup-container .cd-buttons li:last-child a {
  background: #52ca52;
  border-radius: 0 0 .25em 0;
}
.no-touch .cd-popup-container .cd-buttons li:last-child a:hover {
  background-color: #c5ccd8;
}
.cd-popup-container .cd-popup-close {
  position: absolute;
  top: 8px;
  right: 8px;
  width: 30px;
  height: 30px;
}
.cd-popup-container .cd-popup-close::before, .cd-popup-container .cd-popup-close::after {
  content: '';
  position: absolute;
  top: 12px;
  width: 14px;
  height: 3px;
  background-color: #8f9cb5;
}
.cd-popup-container .cd-popup-close::before {
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
  left: 8px;
}
.cd-popup-container .cd-popup-close::after {
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  transform: rotate(-45deg);
  right: 8px;
}
.is-visible .cd-popup-container {
  -webkit-transform: translateY(0);
  -moz-transform: translateY(0);
  -ms-transform: translateY(0);
  -o-transform: translateY(0);
  transform: translateY(0);
}
@media only screen and (min-width: 1170px) {
  .cd-popup-container {
    margin: 8em auto;
  }
}
    </style>
    @endsection

    @section('header_title')
    Adiantamento/PrestaĂ§ĂŁo de conta
    @endsection

    @section('submenu')
    <li class="breadcrumb-item"><a href="{{ route('Painel.Financeiro.AdiantamentoPrestacao.Financeiro.index') }}">Saldo por usuĂĄrio</a>
    </li>
    <li class="breadcrumb-item active" style="color: black;">TransferĂȘncia de solicitaĂ§ĂŁo de adiantamento
    </li>
    @endsection

    @section('body')
   <div>

<div id="loadingdiv" style="display:none;margin-top: 200px; margin-left: 570px;">
<img style="width: 30px; margin-top: -100px;" src="{{URL::asset('/public/imgs/loading.gif')}}"/>
<h6 style="font-size: 20px;margin-left:-170px;">Aguarde, estamos atualizando a solicitaĂ§ĂŁo de reembolso...</h6>
</div>

  <div class="row" id="div_all">

        <div class="content-wrapper-before blue-grey lighten-5"></div>
        <div class="col s12">
          <div class="container">
			
<section class="invoice-edit-wrapper section">


<form role="form" id="form" action="{{ route('Painel.Financeiro.AdiantamentoPrestacao.Financeiro.transferenciastore') }}" method="POST" role="search" enctype="multipart/form-data" >
  {{ csrf_field() }}

  <input type="hidden" name="pasta" id="pasta" value="{{$datas->Pasta}}">
  <input type="hidden" name="solicitanteemail" id="solicitanteemail" value="{{$datas->SolicitanteEmail}}">
  <input type="hidden" name="solicitantecpf" id="solicitantecpf" value="{{$datas->SolicitanteCPF}}">
  <input type="hidden" name="solicitanteid" id="solicitanteid" value="{{$datas->SolicitanteID}}">
  <input type="hidden" name="solicitantesetor" id="solicitantesetor" value="{{$datas->SolicitanteSetorCodigo}}">
  <input type="hidden" name="solicitanteunidade" id="solicitanteunidade" value="{{$datas->SolicitanteUnidadeCodigo}}">
  <input type="hidden" name="id" id="id" value="{{$datas->id}}">
  <input type="hidden" name="moeda" id="moeda" value="{{$datas->Moeda}}">
  <input type="hidden" name="valor" id="valor" value="<?php echo number_format($datas->valor_original,2,",",".") ?>";


    <!--Inicio Modal Anexos --> 
<div id="anexos{{$datas->id}}" class="modal modal-fixed-footer" style="width: 100%;height:100%;overflow:hidden;">

<button type="button" class="btn waves-effect mr-sm-1 mr-2 modal-close red" style="margin-left: 1255px; margin-top: 5px;">
  <i class="material-icons">close</i> 
</button>

<iframe style=" position:absolute;
top:60;
left:0;
width:100%;
height:100%;" src="{{ route('Painel.Financeiro.AdiantamentoPrestacao.anexos', $datas->id) }}"></iframe>

</div>
<!--Fim Modal Anexos --> 


  <div class="row"  style="padding: 5px;">

    <div class="col xl9 m8 s12">
      <div class="card">
      <a href="#anexos{{$datas->id}}" class="btn-floating btn-mini waves-effect waves-light tooltipped modal-trigger"data-position="left" data-tooltip="Clique aqui para visualizar os anexos."  style="margin-left: 885px;margin-top:-10px;background-color: gray;"><i class="material-icons">attach_file</i></a>

        <div class="card-content px-36">


           <div class="row invoice-info">
            <div class="col m4 s4">
              <h6 class="invoice-from">Dados da solicitaĂ§ĂŁo</h6>
              <div class="invoice-address" style="font-size: 10px;">
              <p style="font-weight: bold;color:black;">Solicitante nome: <?php echo mb_convert_case($datas->SolicitanteNome, MB_CASE_TITLE, "UTF-8")?></p>
              </div>

              <div class="invoice-address" style="font-size: 10px;">
              <p style="font-weight: bold;color:black;">Solicitante e-mail: {{$datas->SolicitanteEmail}}</p>
              </div>

              <div class="invoice-address" style="font-size: 10px;">
              <p style="font-weight: bold;color:black;">Solicitante CPF: {{$datas->SolicitanteCPF}}</p>
              </div>

              <div class="invoice-address" style="font-size: 10px;">
              <p style="font-weight: bold;color:black;">Solicitante setor: {{$datas->SolicitanteSetorCodigo}}</p>
              </div>

              <div class="invoice-address" style="font-size: 10px;">
              <p style="font-weight: bold;color:black;">Solicitante unidade: {{$datas->SolicitanteUnidadeCodigo}}</p>
              </div>

              <div class="invoice-address" style="font-size: 10px;">
              <p style="font-weight: bold;color:black;">Data da solicitaĂ§ĂŁo: {{ date('d/m/Y', strtotime($datas->DataSolicitacao)) }}</p>
              </div>

              <div class="invoice-address" style="font-size: 10px;">
              <p style="font-weight: bold;color:black;">Motivo: {{$datas->motivo}}</p>
              </div>

              <div class="invoice-address" style="font-size: 10px;">
              <p style="font-weight: bold;color:green;">Valor solicitado: R$ <?php echo number_format($datas->valor_original,2,",",".") ?></p>
              </div>

            </div>

            <div class="col m4 s4">
              <h6 class="invoice-from">Dados bancĂĄrios do solicitante</h6>

            <div class="invoice-address" style="font-size: 10px;">
            <p style="font-weight: bold;color:black;">Banco: {{$datas->BancoDescricao}}</p>
            </div>

            <div class="invoice-address" style="font-size: 10px;">
            <p style="font-weight: bold;color:black;">AgĂȘncia: {{$datas->Agencia}}</p>
            </div>

            <div class="invoice-address" style="font-size: 10px;">
            <p style="font-weight: bold;color:black;">Conta: {{$datas->Conta}} </p>
            </div>

            <div class="invoice-address" style="font-size: 10px;">
            <p style="font-weight: bold;color:black;">Moeda: {{$datas->Moeda}}</p>
            </div>

            </div>
            
          </div>
          
          <div class="divider mb-3 mt-3"></div>


          <div class="invoice-subtotal">

          <div class="row">
          <div class="input-field col s12" style="margin-top: -15px;">
          <div class="form-group">
          <div class="form-group">
          <label class="control-label" style="font-size: 11px;">InformaĂ§Ă”es da solicitaĂ§ĂŁo:</label>
          <textarea readonly id="observacao" rows="3" type="text" name="observacao" class="form-control" placeholder="Insira a observaĂ§ĂŁo abaixo." style="height: 5rem;text-align:left; overflow:auto;font-size: 10px;">{{$datas->Observacao}}</textarea>
          </div>
          </div>
          </div>   
          </div>  


          </div>

        </div>
      </div>
    </div>
    <!-- invoice action  -->


    <div class="col xl3 m4 s12">
      <div class="card invoice-action-wrapper mb-10">
        <div class="card-content">


        <div class="row" style="font-size:10px;" id="aprovadiv">

        <div class="input-field col m12 s12">
        <span style="font-size: 11px;">Data de competĂȘncia:</span>
        <div class="form-group bmd-form-group is-filled">
        <input style="font-size: 10px;" type="date" name="datacompetencia" id="datacompetencia" value="{{$datahoje}}" min="{{$datahoje}}">
        </div>
        </div>

        <div class="input-field col m12 s12">
        <span style="font-size: 11px;">Data de programaĂ§ĂŁo:</span>
        <div class="form-group bmd-form-group is-filled">
        <input style="font-size: 10px;" type="date" name="datapagamento" id="datapagamento" value="{{$datahoje}}" min="{{$datahoje}}">        
        </div>
        </div>

        <div class="input-field col m12 s12">
        <span style="font-size: 11px;">Tipo de lanĂ§anmento:</span>
        <div class="form-group bmd-form-group is-filled">
        <select class="invoice-item-select browser-default" style="font-size: 10px;" name="tipolan" id="tipolan">
          <option value="" selected>Selecione abaixo</option>
          @foreach($tiposlan as $tipolan)   
           <option value="{{$tipolan->Codigo}}">{{$tipolan->Codigo}} - {{$tipolan->Descricao}}</option>
          @endforeach
        </select>      
        </div>
        </div>

        <div class="input-field col m12 s12">
        <span style="font-size: 11px;">Banco de saĂ­da:</span>
        <div class="form-group bmd-form-group is-filled">
        <select class="invoice-item-select browser-default" style="font-size: 10px;" name="portador" id="portador">
          <option value="" selected>Selecione abaixo</option>
          @foreach($bancos as $banco)   
           <option value="{{$banco->Codigo}}">{{$banco->Descricao}}</option>
          @endforeach
        </select>      
        </div>
        </div>

        <div class="input-field col m12 s12" style="display: none;">
          <span style="font-size: 10px;">Selecione o comprovante da transferĂȘncia:</span>
          <input style="font-size: 10px;"  type="file" id="select_file"  name="select_file" accept=".jpg,.png,.xls,.xlsx,.pdf,.doc,.docx,.rtf,.jpeg" class="dropify" data-default-file="" />
          </div>

        </div>

      
        <br>

        <div class="invoice-action-btn">
            <a onClick="abreconfirmacao();" style="background-color: gray;color:white;font-size:11px;" class="btn waves-effect waves-light display-flex align-items-center justify-content-center">
              <i class="material-icons mr-3">save</i>
              <span class="responsive-text" id="btngravar">Atualizar solicitaĂ§ĂŁo</span>
            </a>
        </div> 

        </div>

        </div>
      </div>

      </div>



  <div id="aprovar" class="cd-popup" role="alert">
	<div class="cd-popup-container">
		<p style="font-weight: bold;">Deseja atualizar a solicitaĂ§ĂŁo de adiantamento?</p>
		<ul class="cd-buttons">
			<li><a href="#" onClick="nao();" style="font-weight: bold;">NĂŁo</a></li>
			<li><a href="#" onClick="sim();" style="font-weight: bold;">Sim</a></li>
		</ul>
		<a onClick="nao();" class="cd-popup-close img-replace">Close</a>
	</div> 
</div> 



</form>
</section>

@endsection

@section('scripts')
    <script src="{{ asset('/public/materialize/js/plugins.min.js') }}"></script>
    <script src="{{ asset('/public/materialize/js/custom-script.min.js') }}"></script>
    <script src="{{ asset('/public/materialize/js/customizer.min.js') }}"></script>
    <script src="{{ asset('/public/materialize/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/public/materialize/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/public/materialize/js/app-invoice.min.js') }}"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
   $('.modal').modal();
});
</script>

 <script>
function abreconfirmacao() {


    $('#aprovar').addClass('is-visible');

}
</script>

<script>
  function sim() {
    $('.modal').css('display', 'none');
    document.getElementById("loadingdiv").style.display = "";
    document.getElementById("div_all").style.display = "none";
    $('.cd-popup').removeClass('is-visible');
    document.getElementById("form").submit();
         
  }    
</script>

<script>
 function nao() {
  $('.cd-popup').removeClass('is-visible');
 }
</script>



@endsection