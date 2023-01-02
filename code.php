<?php
session_start();
require 'dbcon.php';

if(isset($_POST['concluir_tarefa']))
{
    $tarefas_id = mysqli_real_escape_string($con, $_POST['concluir_tarefa']);

    $query = "DELETE FROM tarefas WHERE id='$tarefas_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Tarefa excluída com sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Não foi possivel excluir a tarefa";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['atualizar_tarefa']))
{
    $tarefas_id = mysqli_real_escape_string($con, $_POST['tarefas_id']);

    $descricao = mysqli_real_escape_string($con, $_POST['descricao']);

    $query = "UPDATE tarefas SET descricao='$descricao'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Tarefa atualizada com sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Tarefa não atualizada";
        header("Location: index.php");
        exit(0);
    }

}

if(isset($_POST['registrar_tarefa']))
{
    $descricao = mysqli_real_escape_string($con, $_POST['descricao']);

    $query = "INSERT INTO tarefas (descricao) VALUES ('$descricao')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Tarefa cadastrada com sucesso!";
        header("Location: tarefa-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Tarefa não cadastrada";
        header("Location: tarefa-create.php");
        exit(0);
    }
}

?>