<?php get_sidebar('admin') ?>
<main class="mt-4">
    <h2 class="text-center">Manager Users</h2>
    <table class="table mt-4">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Full name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">State</th>
                <th scope="col">Created at</th>
                <th scope="col">Tool</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list_users as $value) {?>
                <tr class="text-center">
                    <th scope="row"><?=$value['id_user']?></th>
                    <td><?=$value['full_name']?></td>
                    <td><?=$value['email']?></td>
                    <td><?=$value['password']?></td>
                    <td><?=$value['status'] == 1 ? 'Verified' : 'Not verified'?></td>
                    <td><?=$value['created_at']?></td>
                    <td>
                        <a href="?mod=admin&action=deleteUser&id=<?=$value['id_user']?>"><i class='bx bx-trash' style="color: red"></i></a>
                    </td>
                </tr>
            <?php }?>
            </tr>
        </tbody>
    </table>
</main>

<?php get_footer('admin') ?>