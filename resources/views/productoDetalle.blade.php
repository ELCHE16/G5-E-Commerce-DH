<?php
  $pagina="Descripcion de Producto";

?>
@extends('layouts.app')
@section('csspersonal')
"{{ asset('/css/styles.css') }}"
@endsection
@section('content')
<main>
  <div class="container" id="mainContainer">
     @include('inc.navBar')
    <hr>
    @if ($errors->all() && isset($errors))
    @php
        $msj[0]="danger";
        $msj[1]="No se agrego el Producto al carrito";
    @endphp
    @endif
    @isset($msj)
  
    @if ($msj[0]=="success")
    <p class="btn alert alert-{{$msj[0]}} col-12" role="alert">
    {{$msj[1]}}
    @endif
    @if ($msj[0]=="danger")
    <p class="btn alert alert-{{$msj[0]}} col-12" role="alert">
    {{$msj[1]}}
    @endif
    </p>                  
    @endisset
    <div class="row" id = "seccionProducto">

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" id="imagenProducto">
        <a href="img/phone.jpg" title="Phone example">
          <img src="{{$producto->img}}"  width="80%" alt="Phone example" class=""/>
              </a>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" id="descProducto">
              <h3><?=$producto->nombre;?></h3>

              <form action="/productoDetalle" class="form-horizontal qtyFrm" method="post" enctype="multipart/form-data">
                @csrf
                <div class="control-group">
                  <label class="control-label" name= "precio" ><span>Precio: <strong>$<?=$producto->precio;?></strong></span></label>
                  <input type="hidden" name="id_producto" value="{{$producto->id_producto}}">
                  <label class="control-label" name= "precio" ><span>Stock: <strong><?=$producto->cantidad;?></strong></span></label>
                  <label class="control-label" name= "precio" ><span>Descuento: <strong><?=$producto->descuento;?></strong> %</span></label>
                  <div class="controls">
                  <input class="cantidad" type="number" name="cantidad" value="{{old("cantidad",1)}}" min="1"
                    max="{{$producto->cantidad}}" placeholder="0" title="cantidad a comprar"/>
                    <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart  <i class="fas fa-shopping-cart"></i></button>
                  </div>
                </div>
              </form>

              <form class="form-horizontal qtyFrm pull-right">
                <div class="control-group">
                  <label class="control-label"><span>Color</span></label>
                  <div class="controls">
                    <select>
                      <option>Black</option>
                      <option>Red</option>
                      <option>Blue</option>
                      <option>Brown</option>
                    </select>
                  </div>
                </div>
              </form>
              <button type="submit" class="btn btn-large btn-primary pull-right my-4"> Comprar <i class="fas fa-shopping-bag"></i></button>

              <br>

              <h4>Métodos de pago</h4>
              <img src="{{asset('img/payment_methods.png')}}" alt="payment_methods.png">
            </div>
          </div>

          <hr>

          <div class="row" id="seccionInfoProducto">
              <div class="col-12">
                <h4>Product Information</h4>
                <table class="table table-bordered">
                  <tbody>
                    <tr class="techSpecRow"><th colspan="2">Producto Detalle</th></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Marca: </td><td class="techSpecTD2"> {{$producto->getMarca->marca}} </td></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Categoria:</td><td class="techSpecTD2">{{$producto->getCategoria->categoria}}</td></tr>
                  </tbody>
                </table>
              </div>

              <div class="col-12">
                <h5>Descripcion</h5>
                <p><?php
                  $array=explode(PHP_EOL,$producto->descripcion);
                  foreach ($array as $key => $caracteristica) {?>
                    <ul type="circle">
                      <li >
                        <?=$caracteristica;?>                        
                      </li>
                    </ul>
                  <?php
                  }
                  ?></p>
              </div>
          </div>
          <hr>
        </div>
  </main>
  <!--End main-->

  @endsection
