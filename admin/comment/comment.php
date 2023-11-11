<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">List Comment</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <!-- Data -->
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table me-1"></i>
        List Comment
      </div>
      <div class="card-body">
        <table id="datatablesSimple">
      
                <tr>
                    <th>HANG HOA</th>
                    <th>SO BL</th>
                    <th>MOI NHAT</th>
                    <th>CU NHAT</th>
                    <th></th>
                </tr>

                <?php
                foreach ($dsbl as $bl) {
                    extract($bl);
                    $ct = "index.php?act=ctcom&id_pro=" . $id_pro;
                    echo '<tr>
            <td>' . $name_pro . '</td>
            <td>' . $sobl . '</td>
         <td>' . $moinhat . '</td>
         <td>' . $cunhat . '</td>
        <td> 
      <a href="' . $ct . '"> <input type="button" value="Chi tiet" id="ct"/></a>  </td>
                        </tr>';
                }
                ?>
            
        </table>
        
      </div>
    </div>
  </div>
</main>