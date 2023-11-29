<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List Bill</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <!-- Data -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                List bill
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name_user</th>
                            <th>Id_bill</th>
                            <th>Quantity_Pro</th>
                            <th>Total_Bill</th>
                            <th>Date_order</th>
                            <th>Status_bill</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listbill as $l) {
                            extract($l);
                            $suabill = "index.php?act=edit_bill&id_bill=" . $id_bill;
                            $xoabill = "index.php?act=delete_bill&id_bill=" . $id_bill;
                            $price_pro =  $price_pro - (($price_pro *  $discount) / 100);
                            // $total_price = $price_pro * $quantity;
                            // $hinhpath = "../upload/" . $image_pro;
                            // if (is_file($hinhpath)) {
                            //     $hinh = "<img src='" . $hinhpath . "' height='70'>";
                            // } else {
                            //     $hinh = "No photo";
                            // }

                            echo '  <tr>
                  <td>' . $name_user . '</td>
                  <td>' . $id_bill . '</td>
                  <td>' . $sum_quantity . '</td>
                  <td>' .  number_format($total_price, 0, ",", ".") . '$' . '</td>
                  <td>' . $date_order . '</td>
                  <td>' . $name_status . '</td>
                  <td>
                  <a href="' . $suabill . '" class="btn btn-warning"><input type="button" value="UPDATE" /></a>
                  <a href="' . $xoabill . '" class="btn btn-danger"><input type="button" value="DELETE" onclick ="return confirm(\'ban co chac chan muon xoa?\')" /></a>
                  </td>
                </tr>';
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</main>