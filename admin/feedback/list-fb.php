<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List feedback</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <!-- Data -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                List feedback
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>NAME_USER</th>
                            <th>EMAIL_USER</th>
                            <th>PHONE_USER</th>
                            <th>SUBJECT_NAME</th>
                            <th>CONTENT</th>
                            <th>STATUS</th>
                            <th>CREATED_AT</th>
                            <th>ACCTION</th>
                        </tr>
                    </thead>

                    <?php foreach ($dsfb as $fb) {
                        extract($fb);
                        $suafb = "index.php?act=edit_fb&id=" . $id;
                        $xoacom = "index.php?act=delete_fb&id=" . $id;
                        echo '<tr>
                           <td>' . $name_user . '</td>
                           <td>' . $email_user . '</td>
                           <td>' . $phone_user . '</td>
                           <td>' . $subject_name . '</td>
                           <td>' . $content . '</td>
                           <td>' . $name_fb . '</td>
                           <td>' . $created_at . '</td>
                           <td> <a href="' . $suafb . '" class="btn btn-warning"><input type="button" value="UPDATE" /></a>
         <a href="' . $xoacom . '" class="btn btn-danger"><input type="button" onclick ="return confirm(\'ban co chac chan muon xoa?\')" value="Delete" /></a>
        </td>
                </tr>';
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</main>