<?php

  require 'db_config.php';

  $id  = $_POST["id"];
  $post = $_POST;

  $sql = "UPDATE tbl_produtos SET nome = '".$post['nome']."'
    ,descricao = '".$post['descricao']."'
    ,cod = '".$post['cod']."'
    ,preco_compra = '".$post['preco_compra']."'
    ,preco_venda = '".$post['preco_venda']."'
    ,qtd = '".$post['quantidade']."'
    ,unidade_medida	 = '".$post['unidade_medida']."'
    ,validade = '".$post['data_validade']."'
    WHERE id = '".$id."'";

  $result = $mysqli->query($sql);

  $sql = "SELECT * FROM tbl_produtos WHERE id = '".$id."'"; 
  $result = $mysqli->query($sql);
  $data = $result->fetch_assoc();

  echo json_encode($data);

?>