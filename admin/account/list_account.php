<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List account</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <!-- Data -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                List account
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dstk as $d) {
                            extract($d);

                            $suatk = "index.php?act=edit_account&id_user=" . $id_user;
                            $xoatk = "index.php?act=delete_account&id_user=" . $id_user;
                            $hinhpath = "../upload/" . $image;

                            if (is_file($hinhpath)) {
                                $hinh = "<img src='" . $hinhpath . "' height='70'>";
                            } else {
                                $hinh = "No photo";
                            }
                            // Kiểm tra vai trò
                            if ($id_role == 2) {
                                $xoatk = ''; // Không hiển thị nút xóa cho admin
                            } else {
                                $xoatk = '<a href="' . $xoatk . '" class="btn btn-danger"><input type="button" value="DELETE" onclick ="return confirm(\'ban co chac chan muon xoa?\')" /></a>';
                            }
                            echo '<tr>
    <td>' . $id_user . '</td>
    <td>' . $username . '</td>
    <td>*********</td>
    <td>' . $name . '</td>
    <td>' . $address . '</td>
    <td>' . $phone . '</td>
    <td>' . $email . '</td>
    <td>' . $hinh . '</td>
    <td>' . $name_role . '</td>
    <td> <a href="' . $suatk . '" class="btn btn-warning"><input type="button" value="UPDATE" /></a>
         ' . $xoatk . '</td>
                </tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <a href="?act=add_account">
                    <input type="submit" class="btn btn-primary" name="them" value="ADD">
                </a>

            </div>
        </div>
    </div>
</main>