<title><?php echo isset($title) ? $title : 'Página Inicial'; ?></title>
<ul>
    <?php 
    if (isset($users) && is_array($users)) {
   
        foreach ($users as $item) { 
    ?>
            <li>ID: <?php echo $item['id']; ?></li>
            <li>Email: <?php echo $item['email']; ?></li>
    <?php 
        }
    } else {
   
        echo "Nenhum usuário encontrado.";
    }
    ?>
</ul>
