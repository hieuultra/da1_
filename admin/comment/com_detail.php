<style>
    .tenhh {
        font-size: 30px;
        font-weight: bold;
        color: black;
    }
</style>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Comment detail</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <!-- Data -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Comment detail
            </div>
            <!-- <div class="tenhh">
                PRODUCT:<?= $onebl['name_pro'] ?>
            </div> -->
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Content</th>
                            <th>Date_com</th>
                            <th>User_com</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ctbl as $ct) {
                            // var_dump($ctbl);
                            extract($ct);
                            $xoabl = "index.php?act=delete_com&id_com=" . $id_com . "&id_pro=" . $id_pro;
                            echo ' <tr>
                    <td>' . $content . '</td>
                    <td>' . $date_com . '</td>
                    <td>' . $user_com . '</td>
                    <td> <a href="' . $xoabl . '" class="btn btn-danger"><input type="button" value="DELETE" onclick ="return confirm(\'ban co chac chan muon xoa?\')" /></a>
                    </td>
                </tr>
';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <a href="?act=list_com">
                <input type="button" class="btn btn-primary" value="LIST_COM">
            </a>
        </div>
    </div>
</main>