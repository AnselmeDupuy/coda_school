<div class="mt-2 mb-2">
    <h1 class="text-center">Liste des utilisateurs</h1>
</div>

<div class="row">
    <a
    href="index.php?component=users&action=create">
        <button type="submit" class="btn btn-primary" name="create_button" id="create_button" >create user</button>
    </a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">UserName</th>
            <th scope="col">Actif</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td>
                        <a
                            href="index.php?component=users&action=toggle_enabled&id=<?php echo $user['id'];?>">
                            <i
                                class="fa-solid <?php echo ($user['enabled'])
                                ? 'fa-circle-check text-success'
                                : 'fa-circle-xmark text-danger' ?>">
                            </i>
                        </a>
                    </td>
                    <td>
                        <a href="index.php?component=users&action=delete&id=<?php echo $user['id'];?> " 
                        onclick='return confirm("Etes-vous sûr de vouloir supprimer?");'
                        >
                            <i class="fa-solid fa-trash"></i>
                        </a>
                        <a href="index.php?component=user&action=modify&id=<?php echo $user['id'];?>">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tr>
        </tbody>
    </table>
</div>