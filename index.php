<?php
 require 'dbconfig.php';
 $sql = $pdo->query('SELECT * FROM users');
 $resultList = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<a href="add.php">Novo usuário</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <tbody>
        <?php foreach ($resultList as $value): ?>
            <tr>
                <td>
                    <?=$value["id"];?>
                </td>
                <td>
                    <?=$value["name"];?>
                </td>
                <td >
                    <?=$value["email"];?>
                </td> 
                <td style='display:flex; justify-content:center; gap: 0.5rem'>
                    <a style='background-color: aqua; border-radius: 1rem; padding: .5rem; text-decoration: none' href="update_action.php?id=<?=$value['id'];?>">Editar</a>
                    <a style='background-color: red; border-radius: 1rem; padding: .5rem; text-decoration: none' href="delete_action.php?id=<?=$value['id'];?>" onclick="return confirm('Remover usuário?')">Excluir</a>
                </td>   
            </tr>
        <?php endforeach; ?>            
    </tbody>
</table>