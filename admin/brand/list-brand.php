<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">List Brand</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <!-- Data -->
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table me-1"></i>
        List Brand
      </div>
      <div class="card-body">
        <table id="datatablesSimple">

            <tr>
              <th>ID</th>
              <th>Name brand</th>
              <th>Img</th>
              <th>Shows_menu</th>
              <th>Acction</th>
            </tr>

  
            <?php foreach ($dsbr as $br) {
              extract($br);

              $suabr = "index.php?act=edit_brand&id_brand=" . $id_brand;
              $xoabr = "index.php?act=delete_brand&id_brand=" . $id_brand;
              $hinhpath = "../upload/" . $img_br;
              if (is_file($hinhpath)) {
                $hinh = "<img src='" . $hinhpath . "' height='100' width='300'>";
              } else {
                $hinh = "No photo";
              }
             
              echo ' 
          <tr>
            <td>' . $id_brand . '</td>
            <td>' . $name_brand . '</td>
            <td>' . $hinh . '</td>
            <td>' . $shows_menu. '</td>
            <td class="text-center">
              <a href="' . $suabr . '" class="btn btn-warning"><input type="button" value="UPDATE" /></a>
              <a href="' . $xoabr . '" class="btn btn-danger"><input type="button" value="DELETE" onclick ="return confirm(\'ban co chac chan muon xoa?\')" /></a>
            </td>
          </tr>';
            }
            ?>
        
        </table>
        <a href="?act=add_brand">
          <input type="submit" class="btn btn-primary" name="them" value="ADD">
        </a>

      </div>
    </div>
  </div>
</main>