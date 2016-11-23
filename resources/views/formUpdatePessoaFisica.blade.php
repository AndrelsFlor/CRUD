@extends ('layouts.dashboard')
@section('page_heading','Update de pessoa física')

@section('section')
@foreach($dados as $valor)
<div class="col-sm-12">
<div class="row">
    <div class="col-lg-6">
        <form role="form"  method="POST" id="formName">
            <div class="form-group">
                <label>Nome Completo</label>
                <input class="form-control" name="nome" required="true" value={{$valor->name}} type="text">
                <p class="help-block"></p>
            </div>
              
              <div class="form-group">
                <label>CPF</label>
                <input class="form-control" name="cpf" required="true" value={{$valor->cpf}}>
                <p class="help-block"></p>
            </div>
           <input type="hidden" name="_token" id="_token" value="{{  Session::token() }}" />
           <input type="hidden" name="idPessoaFisica" value={{$valor->id}}>
            <button type="submit" class="btn btn-default">Submit Button</button>
            <button type="reset" class="btn btn-default">Reset Button</button>
        </form>
    
       
    </div>
</div>
</div>

@endforeach
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $("#formName").submit(function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type:"POST",
            url:"submit",
            data:data,
            success:function(){
                alert("Pessoa Física cadastrada com sucesso!");
                $("#formName").trigger("reset");
            }
        });

    });

</script>

@stop