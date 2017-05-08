<?php

require 'db_config.php';

  $post = $_POST;
  $sql = "INSERT INTO tbl_produtos (nome,
                                   descricao,
                                   cod,
                                   preco_compra,
                                   preco_venda,
                                   qtd,
                                   unidade_medida,
                                   validade) 
            VALUES ('".$post['nome']."','
                     ".$post['descricao']."','
                     ".$post['codigo']."','
                     ".$post['preco_compra']."','
                     ".$post['preco_venda']."','
                     ".$post['quantidade']."','
                     ".$post['unidade_medida']."','
                     ".$post['data_validade']."')";

  $result = $mysqli->query($sql);
  $sql = "SELECT * FROM tbl_produtos Order by id desc LIMIT 1"; 
  $result = $mysqli->query($sql);
  $data = $result->fetch_assoc();

?>