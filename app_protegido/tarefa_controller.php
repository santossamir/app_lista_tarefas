<?php
   
   require "./app_protegido/tarefa.model.php";
   require "./app_protegido/tarefa.service.php";
   require "./app_protegido/conexao.php";

   echo '<pre>';
   print_r($_POST);
   echo '</pre>';

   $tarefa = new Tarefa();
   $tarefa->__set('tarefa', $_POST['tarefa']);

   $conexao = new Conexao();

   $tarefaService = new TarefaService($conexao, $tarefa);
   $tarefaService->inserir();


   echo '<pre>';
   print_r($tarefaService);
   echo '</pre>';

?>