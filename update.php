<?php
require 'dbconfig.php';
$id = filter_input(INPUT_GET, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST,'email'); 
$nameSelect = '';
$emailSelect = '';

if($id){
    if($name && $email){
        $sql = $pdo->prepare('UPDATE users SET name = :name, email = :email WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
        $sql->execute();
        header('location: index.php');
        exit;
    }
    $sql = $pdo->prepare('SELECT * FROM users WHERE id = :id');
    $sql->bindValue(':id', $id);
    $sql->execute();
    $resultList = $sql->fetchAll(PDO::FETCH_ASSOC);
    $nameSelect = $resultList[0]['name'];
    $emailSelect = $resultList[0]['email'];
} else {
    header('location: index.php');
    exit;
}
?>

<h1>Editar usuário</h1>
<form method="POST" action="update_action.php?id=<?=$id;?>" style="height: 80vh; display:flex; align-items: center; justify-content: center; flex-direction: column; gap: 5px;">
    <label>Nome </br>
        <?php echo "<input type='text' name='name' value='$nameSelect'> "?>
    </label>
    </br>
    <label>Email </br>
        <?php echo "<input type='text' name='email' value='$emailSelect'> "?>
    </label>
    <div>
        <button>Cancelar</button>
        <button type="submit">Salvar</button>
    </div>
</form>
