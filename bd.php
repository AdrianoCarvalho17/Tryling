<?php

$servidor            = "localhost";
$usuario_mysql       = "root";
$senha_mysql         = "";

$nome_banco_de_dados = "linguas";

$nome_tabela_1       = "usuario";
$nome_tabela_2       = "teste_pro";
$nome_tabela_3       = "cursos";
$nome_tabela_4       = "salvos";


$conn = mysqli_connect($servidor, $usuario_mysql, $senha_mysql) or die ("Falha na conexão com MySQL");
	
mysqli_query($conn, "DROP DATABASE $nome_banco_de_dados") or die ("BD $nome_banco_de_dados ainda não foi criado!");

mysqli_query($conn, "CREATE DATABASE $nome_banco_de_dados") or die ("Falha na criação do BD $nome_banco_de_dados");

mysqli_select_db($conn, $nome_banco_de_dados) or die ("Falha na selecao do BD $nome_banco_de_dados");

echo "<center><h1>Processamento de criação de BD e Tabelas realizado com sucesso!</h1>";
echo "<center><h3>Banco de dados <b> $nome_banco_de_dados </b> criado </h3>";

mysqli_query($conn, "CREATE TABLE $nome_tabela_1 (

                                           email      VARCHAR  (080),
                                           senha      VARCHAR  (025),
                                           nome       VARCHAR  (050),
                                              
                                            
											PRIMARY KEY(email)
											)
                                            COLLATE='utf8_general_ci'
                                            ENGINE=InnoDB") or die ("<br>ERRO_$nome_tabela_1");

echo "<center><h3>Tabela(s) <b> $nome_tabela_1 </b> criada(s) </h3>";
mysqli_query($conn, "CREATE TABLE $nome_tabela_2 (

                                          cod_test       INT      (010),
                                          nivel          VARCHAR  (015),
                                          resultado      VARCHAR  (020),
                                          email          VARCHAR  (080),
                                                 
                                            
											PRIMARY KEY(cod_test)
											)
                                            COLLATE='utf8_general_ci'
                                            ENGINE=InnoDB") or die ("<br>ERRO_$nome_tabela_2");

echo "<center><h3>Tabela(s) <b> $nome_tabela_2 </b> criada(s) </h3>";
mysqli_query($conn, "CREATE TABLE $nome_tabela_3 (

                                           lingua        VARCHAR  (025),
                                           nivel         VARCHAR  (015),
                                           cod_test      INT      (010),
                                        
                                            
											PRIMARY KEY(lingua)
											)
                                            COLLATE='utf8_general_ci'
                                            ENGINE=InnoDB") or die ("<br>ERRO_$nome_tabela_3");

echo "<center><h3>Tabela(s) <b> $nome_tabela_3 </b> criada(s) </h3>";
mysqli_query($conn, "CREATE TABLE $nome_tabela_4 (

                                           salvos       INT      (010),
                                           progresso    VARCHAR  (001),
                                           lingua       VARCHAR  (030),
                                           email        VARCHAR  (010),
                                                
                                            
											PRIMARY KEY(salvos)
											)
                                            COLLATE='utf8_general_ci'
                                            ENGINE=InnoDB") or die ("<br>ERRO_$nome_tabela_4");

echo "<center><h3>Tabela(s) <b> $nome_tabela_4 </b> criada(s) </h3>";


$consulta = "ALTER TABLE $nome_tabela_2 ADD CONSTRAINT Email FOREIGN KEY (email) REFERENCES $nome_tabela_1 (email)";

$consulta = "ALTER TABLE $nome_tabela_3 ADD CONSTRAINT nivel FOREIGN KEY (nivel) REFERENCES $nome_tabela_2 (nivel)";

$consulta = "ALTER TABLE $nome_tabela_4 ADD CONSTRAINT lingua FOREIGN KEY (ligua) REFERENCES $nome_tabela_3 (ligua)";

$consulta = "ALTER TABLE $nome_tabela_4 ADD CONSTRAINT login_ FOREIGN KEY (email) REFERENCES $nome_tabela_1 (email)";


if (mysqli_query($conn, $consulta)) {
    echo "A chave estrangeira foi adicionada com sucesso.";
} else {
    echo "Ocorreu um erro na adição da chave estrangeira: " . mysqli_error($conn);
}



























?>