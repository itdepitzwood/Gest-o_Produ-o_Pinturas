# Gestao_Producao_Pinturas
Gestão Produção Secção Pinturas - Check-In e Check-Out Kanban

Aplicalção que permite criar check in e check out nas duas areas de Pintura (Pintura Primário ID= 21 + Pintura Acabamento ID= 23).

A aplicação contem varios tipos de validação a começar que não permite ao clicasr no botão (CHECK-IN/CHECK-OUT) sem o Inout estar preenchido, ou seja não aceita vazio.

          CHECK-IN
O Check-In contem as seguintes validações:
 - valida se ja foi efetuado algum Check-in, se sim mostra a seguinte mensagem: "ERRO, este Kanban ja foi efetuado o Check-In" e não regista nada.
 - Valida se é o numero de kanban, verifica se contem 3x (-) , caso contrario não regista, e mostra a seguinte mensagem: "Identificação errada, coloque o Nº de    Kannan".
 
 Em caso de sucesso mostra a seguinte menssagem:
 - Check-In Efetuado com Sucesso
 
 A aplicação no caso de sucesso CHECK-IN escreve na tabela as seguintes informações: Numero Kanban, Secção e Data&Hora de Registo Check-In

        CHECK-OUT
O Check-Out contem as seguintes validações:
  - Verifica se foi efetuado anteriormente o Check-In pelo Nº Kanban, caso verifique que não foi efetuado o Check-In anteriormente mostra a seguinte menssagem: Erro, Check-In ainda não efetuado. Necessário efetuar Check-in Primeiro" e não regista nada.
  - Validando a existência de Check-In, faz outra validação, verifica se ja anteriormente foi efetuado o Check-Out pela existencia de data no campo "date_check_out" da tabela, se existir então não atualiza a data e mostra a seguinte menssagem: "Check_Out Já foi Efetuado".
  
Em caso de sucesso mostra a seguinte menssagem:
  "Check-Out Efetuado com sucesso"
  
  A aplicação no caso de sucesso CHECK-IN escreve na tabela a seguinte informação: Data&Hora de Registo Check-Out
  
  a Base de Dados Chama-se GP_test que contem os seguintes campos (id + id_kanban + section + date_check_in + date_check_out) com chaves estrangeiras consosante o ambiente já existente.
  
  Ficheiro de Conexão com a base de dados está localizado no seguinte caminho do projeto: conection/config_file.ini
  
  Inputs com Autofocus.
  
  A Aplicação foi construida com as seguintes tecnologias: Bootstrap 4 + JavaScript + PHP 8 + Mysql.
