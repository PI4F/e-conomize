/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Se atentar a esses dois vídeos:
    //https://www.youtube.com/watch?v=fVgWqNWylZo
    //https://www.youtube.com/watch?v=vJMHYY-38nA
    //Algumas alterações de estilos:
    //https://tiagobutzke.wordpress.com/2010/05/18/manipulando-css-com-javascript/

function validacao(form,status,load){

    var problemas    = false; //Declaração e inicialização da variável que irá registrar se algum problema for encontrado
    var formulario   = form.nome_do_form.value;
  //var soNumero     = /[^0-9]$/; //Variável que servirá para realizar testes em campos que só devam ter números
    var soDecimal    = /^[+-]?((\d+|\d{1,3}(\.\d{3})+)(\,\d*)?|\,\d+)$/;
    console.log("Valor de LOAD == "+load);
    
    console.log('Entrou em VALIDAÇÃO == '+formulario);
    var msgStatus = [];
    console.log("XXX");
 
    function altCampo(campo,acao){
        if(acao==='reset'){
            form[campo].style.borderColor = ""; //Zera a configuração de borda do INPUT correspondente
            form[campo].style.outlineColor = ""; //Zera a configuração de borda de FOCUS do INPUT correspondente
        }
        if(acao==='red'){
            form[campo].style.borderColor = "red"; //Mudar a borda do INPUT correspondente para vermelho
            form[campo].style.outlineColor = "red"; //Mudar a borda de FOCUS do INPUT correspondente para vermelho
            form[campo].focus();
        }
    }
    
    console.log('Valor do STATUS == '+status);
    if(status!==null&&status!=='null'){
        altStatus(status,'hide',null);
    }
    console.log("Valor de LOAD == "+load);
    loading(load,true);
    console.log("333");
    
    function validarCampo(campo,tipo,label){
        
        console.log('VALIDADOR == Entrou ('+campo+','+tipo+','+label+')');
        switch(tipo){
            case 'text':
                console.log('VALIDADOR == Validando tipo "TEXT"');
                altCampo(campo,'reset');
                if(form[campo].value===''){
                    console.log('VALIDADOR == Erro ao validar ==> Campo vazio');
                    problemas = true;
                    msgStatus.push('* '+label+' == Campo não pode estar vazio');
                    altCampo(campo,'red');
                }else{
                    if(form[campo].value.length>100){
                        console.log('VALIDADOR == Erro ao validar ==> string muito grande');
                        problemas = true;
                        if(label!==null){
                            msgStatus.push('* '+label+' com tamanho maior do que o permitido');
                        }else{
                            msgStatus.push('* NOME com tamanho maior do que o permitido');
                        }
                        altCampo(campo,'red');
                    }
                }
                break;
            case 'select':
                console.log('VALIDADOR == Validando tipo "SELECT"');
                altCampo(campo,'reset');
                if(form[campo].value===''){
                    console.log('VALIDADOR == Erro ao validar ==> Campo vazio');
                    problemas = true;
                    msgStatus.push('* Por favor escolha uma opção válida em '+label);
                    altCampo(campo,'red');
                }
                break;
            case 'decimal':
                console.log('VALIDADOR == Validando tipo "DECIMAL"');
                altCampo(campo,'reset');
                if(!soDecimal.test(form[campo].value)){
                    console.log('VALIDADOR == Erro ao validar ==> decimal inválido');
                    problemas = true;
                    msgStatus.push('* Por favor digitar um(a) '+label+' válido(a)');
                    altCampo(campo,'red');
                }
                break;
            case 'data':
                console.log('VALIDADOR == Validando tipo "DATA"');
                altCampo(campo,'reset');
                if(form[campo].value===''){
                    console.log('VALIDADOR == Erro ao validar ==> Campo vazio');
                    problemas = true;
                    msgStatus.push('* '+label+' == Por favor insira uma data válida');
                    altCampo(campo,'red');
                }
                break;
        }
        console.log('VALIDADOR == FIM da validação');
    }
    
    switch(formulario){
        case 'preco':
            validarCampo('preco','decimal','PREÇO');
            validarCampo('qnt','decimal','QUANTIDADE');
            validarCampo('compraID','select','COMPRA');
            validarCampo('produtoID','select','PRODUTO');
            if(form.promocao.value==='1'){
                altCampo('tipo_promocao','reset');
                if(form.tipo_promocao.value===''){
                problemas = true;
                msgStatus.push('* Por favor escolha um TIPO DE PROMOÇÃO válida ou mude PROMOÇÃO para <strong>NÃO</strong>');
                altCampo('tipo_promocao','red');
                }
            }
            break;
        case 'compra':
            validarCampo('nome','text','NOME');
            validarCampo('dataID','data','DATA E HORA');
            validarCampo('lugarID','select','LUGAR');
            break;
        case 'produto':
            validarCampo('nome','text');
            validarCampo('tipo_produtoID','select','TIPO');
            validarCampo('marcaID','select','MARCA');
            validarCampo('medidaID','select','MEDIDA');
            validarCampo('valor_medida','decimal','MEDIDA');
            break;
        case 'lugar':
            validarCampo('nome','text','LUGAR');
            validarCampo('tipo_lugarID','select','TIPO DE LUGAR');
            validarCampo('endereco','text','ENDEREÇO');
            validarCampo('horario','text','HORÁRIO');
            break;
        case 'tipo_produto':
            validarCampo('nome','text');
            validarCampo('categoriaID','select','CATEGORIA');
            break;
        case 'categoria_produto':
        case 'marca':
        case 'medida':
        case 'tipo_lugar':
            validarCampo('nome','text');
            break;
    }
    if(status!==null&&status!=='null'&&problemas===true){
        altStatus(status,'fail',msgStatus);
    }
    
    return problemas;
}
