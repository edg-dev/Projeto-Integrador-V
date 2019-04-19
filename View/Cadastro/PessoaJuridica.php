<?php include '../Templates/header.php'; ?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<h2> Cadastro de Pessoa Juridica </h2>
<!--Completar Campos de Id,For e placeholder-->
<form>
    <div class="form-group">
        <label for="">Nome Completo</label>
        <input type="text" class="form-control" id="" placeholder="Coloque Seu Nome Completo" required>
    </div>

    <div class="form-group">
        <label for="">E-Mail</label>
        <input type="email" class="form-control" id="" placeholder="Coloque Seu E-Mail" required>
    </div>

    <div class="form-group">
        <label for="">Senha</label>
        <input type="password" class="form-control" id="" placeholder="Coloque Sua Senha" required>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="">Telefone Empresarial 1</label>
            <input type="text" class="form-control" id="" placeholder="">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Telefone Empresarial 2</label>
            <input type="text" class="form-control" id="" placeholder="">
        </div>
    </div>

    <div class="form-group">
        <label for="">CNPJ</label>
        <input type="text" class="form-control" id="" placeholder="">
    </div>

    <!--Endereco Completo com uma funcao de Buscar Atomaticamente-->
    <div class="form-group">
        <label for="cep">CEP</label>
		<input type="text" class="form-control" id="cep" required/>

        <label for="logradouro">Logradouro</label>
		<input type="text" class="form-control" id="logradouro" placeholder="" required/>

        <label for="numero">Número</label>
		<input type="text" class="form-control" id="numero" placeholder="" required/>

        <label for="complemento">Complemento</label>
		<input type="text" class="form-control" id="complemento" placeholder=""/>

        <label for="bairro">Bairro</label>
		<input type="text" class="form-control" id="bairro" placeholder="" required/>

        <label for="uf">Estado</label>
		<select class="form-control" id="uf">
			<option value="AC">Acre</option>
			<option value="AL">Alagoas</option>
			<option value="AP">Amapá</option>
			<option value="AM">Amazonas</option>
			<option value="BA">Bahia</option>
			<option value="CE">Ceará</option>
			<option value="DF">Distrito Federal</option>
			<option value="ES">Espírito Santo</option>
			<option value="GO">Goiás</option>
			<option value="MA">Maranhão</option>
			<option value="MT">Mato Grosso</option>
			<option value="MS">Mato Grosso do Sul</option>
			<option value="MG">Minas Gerais</option>
			<option value="PA">Pará</option>
			<option value="PB">Paraíba</option>
			<option value="PR">Paraná</option>
			<option value="PE">Pernambuco</option>
			<option value="PI">Piauí</option>
			<option value="RJ">Rio de Janeiro</option>
			<option value="RN">Rio Grande do Norte</option>
			<option value="RS">Rio Grande do Sul</option>
			<option value="RO">Rondônia</option>
			<option value="RR">Roraima</option>
			<option value="SC">Santa Catarina</option>
			<option value="SP">São Paulo</option>
			<option value="SE">Sergipe</option>
			<option value="TO">Tocantins</option>
		</select>
    </div>

    <div class="form-group">
        <label for="">Estado Civil</label>
        <select id="">
        <option value="Selecione seu Estado Civil"></option>
        <option value="Solteiro">Solteiro</option>
        <option value="Casado">Casado</option>
        <option value="Separado">Separado</option>
        <option value="Divorciado">Divorciado</option>
        <option value="Viúvo">Viúvo</option>
        <option value="Amasiado">Amasiado</option>
        </select>
    </div>

    <div class="form-group">
        <label for="">Profissão</label>
        <input type="text" class="form-control" id="" placeholder="" required/>
    </div>

    <div class="form-group">
        <label for="">Creci</label>
        <input type="text" class="form-control" id="" placeholder=""/>
    </div>

    <button type="button" class="btn btn-primary btn-lg btn-block" value="submit">Cadastrar</button>
</form>
<!--JS do CEP -->
<script type="text/javascript">
	$("#cep").focusout(function(){
		//Início do Comando AJAX
		$.ajax({
			//O campo URL diz o caminho de onde virá os dados
			//É importante concatenar o valor digitado no CEP
			url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
			//Aqui você deve preencher o tipo de dados que será lido,
			//no caso, estamos lendo JSON.
			dataType: 'json',
			//SUCESS é referente a função que será executada caso
			//ele consiga ler a fonte de dados com sucesso.
			//O parâmetro dentro da função se refere ao nome da variável
			//que você vai dar para ler esse objeto.
			success: function(resposta){
				//Agora basta definir os valores que você deseja preencher
				//automaticamente nos campos acima.
				$("#logradouro").val(resposta.logradouro);
				$("#complemento").val(resposta.complemento);
				$("#bairro").val(resposta.bairro);
				$("#cidade").val(resposta.localidade);
				$("#uf").val(resposta.uf);
				//Vamos incluir para que o Número seja focado automaticamente
				//melhorando a experiência do usuário
				$("#numero").focus();
			}
		});
	});
</script>

<?php include '../Templates/footer.php'; ?>