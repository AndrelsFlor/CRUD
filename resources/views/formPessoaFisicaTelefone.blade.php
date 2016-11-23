@extends('layouts.dashboard')
@section('page_heading','Cadastrar Telefone')
@section('section')
           
 <div class="col-sm-12">
 <div class="row">
     <div class="col-lg-6">
         <form role="form"  method="POST" id="formEmail">
             <div class="form-group">
                 <label>Telefone</label>
                 <input class="form-control" name="telefone" required="true" >
                 <p class="help-block"></p>
             </div>
            
            <input type="hidden" name="_token" id="_token" value="{{  Session::token() }}" />
            <input type="hidden" name="idPessoaFisica" value="{{$idPessoa}}">
             <button type="submit" class="btn btn-default">Submit Button</button>
             <button type="reset" class="btn btn-default">Reset Button</button>
         </form>
     
        
     </div>
 </div>
 </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
 <script>
 $(document).ready(function(){
    $("#formEmail").submit(function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url:'submit',
            type:'post',
            data:data,
            success:function(){
                alert('Telefone cadastrado com sucesso!');
                $("#formEmail").trigger('reset');
            }
        });

    });
 });

 </script>
            
@stop
