@extends ('layouts.dashboard')
@section('page_heading','Cadastro de pessoa juridíca')

@section('section')

<div class="col-sm-12">
<div class="row">
    <div class="col-lg-6">
        <form role="form"  method="POST" id="formName">
            <div class="form-group">
                <label>Nome Completo</label>
                <input class="form-control" name="nome" required="true">
                <p class="help-block"></p>
            </div>
            <div class="form-group">
                <label>Nome Fantasia</label>
                <input class="form-control" name="nomeFantasia" required="true">
                <p class="help-block"></p>
            </div>
              
              <div class="form-group">
                <label>CNPJ</label>
                <input class="form-control" name="cnpj" required="true">
                <p class="help-block"></p>
            </div>
           <input type="hidden" name="_token" id="_token" value="{{  Session::token() }}" />
            <button type="submit" class="btn btn-default">Submit Button</button>
            <button type="reset" class="btn btn-default">Reset Button</button>
        </form>
    
       
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#formName").submit(function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type:"POST",
            url:"./cadastraPessoaJuridica",
            data:data,
            success:function(){
                alert('Pessoa jurídica cadastrada com sucesso!');
                $("#formName").trigger("reset");

            }
        });

    });
});

</script>
@stop