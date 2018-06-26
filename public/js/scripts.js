/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
*/

function show_diag(diag) {
    var dialog   = document.getElementById(diag);
    dialog.show();
};

function close_diag(diag,inputup,newvalue,newlabel) {
    var dialog   = document.getElementById(diag);
    if(inputup!==null){
        $(inputup).append('<option value="'+newvalue+'">'+newlabel+'</option>');
        $(inputup+' option[value="'+newvalue+'"]').prop('selected',true);
        $(inputup).focus();
    }
    dialog.close();
}

function val_radio(value,campo) {
    var x  = document.getElementById(value);
    var xb = document.getElementById('btnAdd_'+value);
    var y  = document.getElementById(campo);
    var yb = document.getElementById('btnAdd_'+campo);
    if(value==='compraID'){
        x.disabled = false;
        xb.disabled = false;
        y.disabled = true;
        yb.disabled = true;
    }
    if(value==='lugarPrecoID'){
        x.disabled = false;
        xb.disabled = false;
        y.disabled = true;
        yb.disabled = true;
    }
}
            
function val_chk(chk,campo) {
    var cmp = document.getElementById(campo);
    if(chk.checked) cmp.disabled = false;
    else cmp.disabled = true;
}
            
function Mostrar(chk,campo){
    var cmp = document.getElementById(campo);
    if(chk.checked) cmp.style.display='';
    else cmp.style.display='none';
}

function Habilitar(chk,campo) {
    var cmp = document.getElementById(campo);
    if(chk.checked) cmp.disabled = false;
    else cmp.disabled = true;
}

function Mostrar_x(lst,div){
    var dv    = document.getElementById(div);
    var valor = lst.selectedIndex;
    if(valor===0) dv.style.display='none';
    else dv.style.display='';
}

var erro_validacao = false;
var status;
var load;

function validar(form,statusX,loadX){
    console.log('VALIDAR BASE');
    erro_validacao = false;
    console.log('statusX ==');
    console.log(statusX!==null);
    console.log('loadX ==');
    console.log(loadX!==null);
    erro_validacao = validacao(form,statusX,loadX);
    console.log('VALIDAR BASE retorno');
    if(status!==null&&load!==null){
        status = statusX;
        load   = loadX;
    }
}

window.load_dados = function(valores, page, div){
    console.log(valores);
    $.ajax
        ({
            type: 'POST',
            dataType: 'html',
            url: page,
            data: valores,
            success: function(msg)
            {
                var data = msg;
                $(div).html(data).fadeIn();             
            }
        });
}

$(function(){

    //Só lembrando que você poderia usar um ONSUBMIT dentro da TAG <form>... babaca 
    var form  = $('.quickform'); //Armazenar na variável FORM todos os elementos HTML com a classe correspondente
    var promo = $('#promocaoID');
    var url   = 'motor/processar.php'; //Arquivo PHP que irá trabalhar com os dados recebidos e dar um retorno
    //alert('Função disparada AUTOMATICAMENTE');
    $('.load').fadeOut('fast');
    
    form.submit(function(){ //Pegar o formulário com CLASSE 'quickform' na ação submit
        console.log('Disparou o SUBMIT');
        
        function carregando(){
            console.log('VALIDAÇÃO DAS VARIAVEIS load E status EM submit ==');
            console.log('load ==');
            console.log(load!==null);
            console.log('status ==');
            console.log(status!==null);
            loading(load,true);
            /*
            if(status!==null){
                altStatus(status,'ativo','ENVIANDO...');
            }
            */
        }
        
        console.log('erro_validacao ==');
        console.log(erro_validacao);
        if(!erro_validacao){ //Se não houver erros na validação
            console.log('Arrumando dados...');
            var dados = $(this).serialize(); //Pegar os dados recebidos do formulário e armazenar em DADOS
            console.log('Enviando...');
            $.ajax({
                url: url,
                type: 'POST',
                data: dados,
                beforeSend: carregando, //uso da função 'carregando' antes de success
                success: function(retorno){ //'retorno' é o return da página PHP que recebe o POST através de um ECHO
                    /*
                    if(status!==null){
                       altStatus(status,'ok','Formulário enviado com sucesso =D');
                    }
                    */
                    loading(load,false);
                    alert(retorno);
                    var obj = JSON.parse(retorno);

                    if(obj.hasOwnProperty('respostaDB')){
                        if(obj['respostaDB']===true){
                        console.log('Recebeu "respostaDB" como TRUE');
                        altStatus(status,'ok','Formulário enviado com sucesso!');

                        if(obj.hasOwnProperty('updateform')){
                            console.log('OBJ tem key "updateform"');
                            console.log(obj.updateform);
                            $('#'+obj.updateform).append('<option value="'+obj.value+'">'+obj.label+'</option>');
                            $('option:contains("'+obj.label+'")').prop('selected', true);
                            if (obj.hasOwnProperty('nome_do_form')) {
                                document.getElementById(obj.nome_do_form).reset();
                                setTimeout(function(){
                                    close_diag('window_'+obj.nome_do_form);
                                },3000);
                            }
                        }
                        }else{
                            altStatus(status,'fail',obj.respostaDB);
                        }
                    }else{
                        if(!obj.OK===true){
                            var msgStatus = [];
                            for (var key in obj){
                                msgStatus.push('<strong>'+key+'</strong> == '+obj[key]);
                            }
                            altStatus(status,'fail',msgStatus);
                        }else{
                            altStatus(status,'ok','Formulário enviado com sucesso!');
                        }
                    }
                    setTimeout(function(){
                        if(status!==null){
                            altStatus(status,'hide');
                        }
                    },3000);
                    loading(load,false);
                }
            });
            console.log('ENVIADO!!!');
            //alert(dados);
            return false;

        }else{ //Se houver erros na validação
            console.log('!!! Formulário não enviado !!!');
            loading(load,false);
            return false;
        }
    });

    //== Parte que cuida das alterações de promoção ==

    promo.change(function(){

        var valor1 = document.getElementById('valor1');
        var label1 = document.getElementById('label_valor1');
        var valor2 = document.getElementById('valor2');
        var label2 = document.getElementById('label_valor2');
        var pos    = document.getElementById('pos');

        switch(promo.val()){
            case '1': // De X por Y == Somente valor 1
            case '3': // Desconto no clube/cartão do lugar == Somente valor 1
                
                valor1.innerHTML = "Valor com desconto: ";
                label1.style.display = "";
                label2.style.display = "none";
                pos.style.display = "none";
                break;
            case '4': // Desconto na 2ª unidade == Somente valor 1
                
                valor1.innerHTML = "2ª unidade por: ";
                label1.style.display = "";
                label2.style.display = "none";
                pos.style.display = "none";
                break;
            case '2': // Leve X e Pague Y == Ambos
                
                valor1.innerHTML = "Leve: ";
                valor2.innerHTML = "Pague: ";
                label1.style.display = "";
                label2.style.display = "";
                pos.style.display = "none";
                break;
            case '5': // Após X unidades, cada 1 sai por Y == Ambos
                
                valor1.innerHTML = "Após: ";
                pos.innerHTML    = "unidades";
                valor2.innerHTML = "Cada um saí: ";
                label1.style.display = "";
                pos.style.display = "";
                label2.style.display = "";
                break;
            case '6': // 1,2,3 Passos da Economia (Extra)
            /* VAZIO */
        }
    });
});

$(document).ready(function(){
    $("#preco").inputmask('decimal', {
                'alias': 'numeric',
                'groupSeparator': ',',
                'autoGroup': true,
                'digits': 2,
                'radixPoint': ",",
                'digitsOptional': false,
                'allowMinus': false,
                'prefix': '',
                'placeholder': '0'
    });
});
