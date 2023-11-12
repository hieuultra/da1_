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
            
                            <th>Content</th>
                            <th>Date_com</th>
                            <th>User_com</th>
                            <th>Action</th>
                            
                        </tr>
                <?php
                foreach ($ctbl as $ct) {
                    // var_dump($ctbl);
                    extract($ct);
                    $xoabl = "index.php?act=xoacomment&id_com=" . $id_com . "&id_pro=" . $id_pro;
                    echo ' <tr>
                    
                    <td>' . $content . '</td>
                    <td>' . $date_com . '</td>
                    <td>' . $nguoibl . '</td>
                    <td><a href="' . $xoabl . '">
                        <input type="button" value="xoa" onclick ="return confirm(\'ban co chac chan muon xoa?\')" id="x"/></a>
                    </td>
                </tr>
';
                }
                ?>

            
        </table>
       
            <a href="?act=comment">
      <input type="button"  value="LIST_CAT">
    </a>
        
      </div>
    </div>
  </div>
</main>