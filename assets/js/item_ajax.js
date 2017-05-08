$( document ).ready(function() {
var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;

manageData();

    /* manage data list */
    function manageData() {
        $.ajax({
            dataType: 'json',
            url: url+'api/getData.php',
            data: {page:page}
        }).done(function(data){
          total_page = Math.ceil(data.total/10);
          current_page = page;

          $('#pagination').twbsPagination({
              totalPages: total_page,
              visiblePages: current_page,
              onPageClick: function (event, pageL) {
                page = pageL;
                    if(is_ajax_fire != 0){
                  getPageData();
                    }
              }
          });

          manageRow(data.data);
            is_ajax_fire = 1;

        });

    }

    /* Get Page Data*/
    function getPageData() {
      $.ajax({
          dataType: 'json',
          url: url+'api/getData.php',
          data: {page:page}
      }).done(function(data){
        manageRow(data.data);
      });
    }

    /* Create new Item */
    $(".crud-submit").click(function(e){
        e.preventDefault();
        var form_action = $("#create-item").find("form").attr("action");
        var nome = $("#create-item").find("input[name='nome']").val();
        var descricao = $("#create-item").find("textarea[name='descricao']").val();
        var codigo = $("#create-item").find("input[name='codigo']").val();
        var preco_compra = $("#create-item").find("input[name='preco_compra']").val();
        var preco_venda = $("#create-item").find("input[name='preco_venda']").val();
        var quantidade = $("#create-item").find("input[name='quantidade']").val();
        var unidade_medida = $("#create-item").find("input[name='unidade_medida']").val();
        var data_validade = $("#create-item").find("input[name='data_validade']").val();

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
                      unidade_medida:unidade_medida,
                      data_validade:data_validade
                  }
            }).done(function(data){
                $(".modal").modal('hide');
                toastr.success('Produto cadastrado.', 'Sucesso', {timeOut: 6000});
            });
        }
        else{
                alert('Você não preencheu os campos Nome e Código.')
            }

    });

    /* Remove Item */
    $("body").on("click",".remove-item",function(){
        var id = $(this).parent("a").data('id');
        var c_obj = $(this).parents("tr");

        $.ajax({
            dataType:'json',
            type:'POST',
            url: url + 'api/delete.php',
            data:{id:id}
        }).done(function(data){
            c_obj.remove();
            toastr.success('Item deletado.', 'Sucesso', {timeOut: 6000});
            getPageData();
        });

    });

    /* Edit Item */
    $("body").on("click",".edit-item",function(){

        var id = $(this).parent("a").data('id');
        var nome = $(this).parent('a').parent('td').prev('td').prev('td').prev('td').prev('td').prev('td').prev('td').prev('td').prev('td').text()
        var descricao = $(this).parent('a').parent('td').prev('td').prev('td').prev('td').prev('td').prev('td').prev('td').prev('td').text()
        var codigo = $(this).parent('a').parent('td').prev('td').prev('td').prev('td').prev('td').prev('td').prev('td').text()
        var preco_compra = $(this).parent('a').parent('td').prev('td').prev('td').prev('td').prev('td').prev('td').text()
        var preco_venda = $(this).parent('a').parent('td').prev('td').prev('td').prev('td').prev('td').text()
        var quantidade = $(this).parent('a').parent('td').prev('td').prev('td').prev('td').text()
        var unidade_medida = $(this).parent('a').parent('td').prev('td').prev('td').text()
        var data_validade = $(this).parent("a").parent("td").prev("td").text();


        $("#edit-item").find("input[name='nome']").val(nome);
        $("#edit-item").find("textarea[name='descricao']").val(descricao);
        $("#edit-item").find("input[name='codigo']").val(codigo);
        $("#edit-item").find("input[name='preco_compra']").val(preco_compra);
        $("#edit-item").find("input[name='preco_venda']").val(preco_venda);
        $("#edit-item").find("input[name='quantidade']").val(quantidade);
        $("#edit-item").find("input[name='unidade_medida']").val(unidade_medida);
        $("#edit-item").find("input[name='data_validade']").val(data_validade);
        $("#edit-item").find(".edit-id").val(id);

    });

    /* Updated new Item */
    $(".crud-submit-edit").click(function(e){

        e.preventDefault();
        var form_action = $("#edit-item").find("form").attr("action");
        var nome = $("#edit-item").find("input[name='nome']").val();
        var descricao = $("#edit-item").find("textarea[name='descricao']").val();
        var cod = $("#edit-item").find("input[name='codigo']").val();
        var preco_compra = $("#edit-item").find("input[name='preco_compra']").val();
        var preco_venda = $("#edit-item").find("input[name='preco_venda']").val();
        var quantidade = $("#edit-item").find("input[name='quantidade']").val();
        var unidade_medida = $("#edit-item").find("input[name='unidade_medida']").val();
        var data_validade = $("#edit-item").find("input[name='data_validade']").val();
        var id = $("#edit-item").find(".edit-id").val();

        if(nome != '' && cod != ''){
            $.ajax({
                dataType: 'json',
                type:'POST',
                url: url + form_action,
                data:{id:id,
                      nome:nome,
                      descricao:descricao,
                      cod:cod,
                      preco_compra:preco_compra,
                      preco_venda:preco_venda,
                      quantidade:quantidade,
                      unidade_medida:unidade_medida,
                      data_validade:data_validade
                  }
            }).done(function(data){
                getPageData();
                $(".modal").modal('hide');
                toastr.success('Item editado', 'Sucesso', {timeOut: 6000});
            });
        }else{
            alert('Você não preencheu os campos Nome e Código.')
        }
    });


    /* Add new Item table row */
    function manageRow(data) {
      var rows = '';
      $.each( data, function( key, value ) {
          rows = rows + '<tr>';
          rows = rows + '<td>'+value.id+'</td>';
          rows = rows + '<td>'+value.nome+'</td>';
          rows = rows + '<td>'+value.descricao+'</td>';
          rows = rows + '<td>'+value.cod+'</td>';
          rows = rows + '<td>'+value.preco_compra+'</td>';
          rows = rows + '<td>'+value.preco_venda+'</td>';
          rows = rows + '<td>'+value.qtd+'</td>';
          rows = rows + '<td>'+value.unidade_medida+'</td>';
          rows = rows + '<td>'+value.data_validade+'</td>';
          rows = rows + '<td class="actions">\
                          <a href="#" data-id="'+value.id+'" data-toggle="modal" data-target="#edit-item">\
                          <img alt="Alterar" class="edit-item" src="../assets/icons/edit.png"></a>\
                          <a href="../api/delete.php" data-id="'+value.id+'"><img class="remove-item" alt="Remover" src="../assets/icons/delete.png">\
                          </a></td> ';
          rows = rows + '</td>';
          rows = rows + '</tr>';
      });

      $("tbody").html(rows);
    }
});