<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List Blog</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <!-- Data -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                List blog
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>News_name</th>
                            <th>Content</th>
                            <th>News_img</th>
                            <th>Create_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dsblog as $d) {
                            extract($d);

                            $suasl = "index.php?act=edit_blog&id=" . $id;
                            $xoasl = "index.php?act=delete_blog&id=" . $id;
                            $hinhpath = "../upload/" . $news_img;
                            if (is_file($hinhpath)) {
                                $hinh = "<img src='" . $hinhpath . "' height='90' width='100'>";
                            } else {
                                $hinh = "No photo";
                            }

                            echo ' 
          <tr>
            <td>' . $news_name . '</td>
            <td>' . $content . '</td>
            <td>' . $hinh . '</td>
            <td>' . $create_at . '</td>
            <td class="text-center">
              <a href="' . $suasl . '" class="btn btn-warning"><input type="button" value="UPDATE" /></a>
              <a href="' . $xoasl . '" class="btn btn-danger"><input type="button" value="DELETE" onclick ="return confirm(\'ban co chac chan muon xoa?\')" /></a>
            </td>
          </tr>
     ';
                        }
                        ?>
                    </tbody>
                </table>
                <a href="?act=add_blog">
                    <input type="submit" class="btn btn-primary" name="them" value="ADD">
                </a>

            </div>
        </div>
    </div>
</main>