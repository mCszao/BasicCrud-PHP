<?php
session_start();
if(isset($_SESSION['warning'])){
    echo $_SESSION['warning'];
    $_SESSION['warning'] = '';
}
?>
<h1>Cadastro de novo usuário</h1>
<form method="POST" action="add_action.php" style="height: 80vh; display:flex; align-items: center; justify-content: center; flex-direction: column; gap: 5px;">
    <label>Nome </br>
        <input type="text" name="name" placeholder="Digite seu nome">
    </label>
    </br>
    <label>Email </br>
        <input type="text" name="email" placeholder="Digite seu email">
    </label>
    <div>
        <button type="submit">Salvar</button>
    </div>
</form>