<?php
   
   require "./app_protegido/tarefa.model.php";
   require "./app_protegido/tarefa.service.php";
   require "./app_protegido/conexao.php";

   $tarefa = new Tarefa();
   $tarefa->__set('tarefa', $_POST['tarefa']);

   $conexao = new Conexao();

   $tarefaService = new TarefaService($conexao, $tarefa);
   $tarefaService->inserir();

   header('Location: nova_tarefa.php?inclusao=1');
?>