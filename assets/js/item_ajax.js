$( document ).ready(function() {

    /* Create new Item */
    $(".crud-submit").click(function(e){
        e.preventDefault();
        var form_action = $("#create-item").find("form").attr("action");
        var nome = $("#create-item").find("input[name='nome']").val();
        var descricao = $("#create-item").find("textarea[name='descricao']").val();
        var codigo = $("#create-item").find("input[name='codigo']").val();
        var codigo = Number(codigo);
        var preco_compra = $("#create-item").find("input[name='preco_compra']").val();
        var preco_venda = $("#create-item").find("input[name='preco_venda']").val();
        var quantidade = $("#create-item").find("input[name='quantidade']").val();
        var unidade = $("#create-item").find("input[name='unidade']").val();
        var data_de_validade = $("#create-item").find("input[name='data_de_validade']").val();

        if(nome != '' && codigo != ''){
            $.ajax({
                dataType: 'json',
                type:'POST',
                url: 'http://localhost/xampp/sistema_estoque/' + form_action,
                data:{nome:nome,
                      descricao:descricao,
                      codigo:codigo,
                      preco_compra:preco_compra,
                      preco_venda:preco_venda,
                      quantidade:quantidade,
                      unidade:unidade,
                      data_de_validade:data_de_validade
                  }
            }).done(function(data){
                alert(data);
                alert(url);
                $(".modal").modal('hide');
                toastr.success('Produto cadastrado com sucesso.', 'Sucesso', {timeOut: 5000});
            });
        }
        else{
                alert('Você não preencheu os campos Nome e Código.')
            }

    });
});