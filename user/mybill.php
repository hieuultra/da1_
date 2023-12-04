<?php
function getStatusColorClass($name_status)
{
    switch ($name_status) {
        case 'da xac nhan':
            return 'status-brown'; // Define your CSS class for brown color here
        case 'dang xu ly':
            return 'status-yellow'; // Define your CSS class for brown color here
        case 'da huy':
            return 'status-red'; // Define your CSS class for red color here
        case 'giao hang thanh cong':
            return 'status-blue'; // Define your CSS class for green color here
        case 'dang giao hang':
            return 'status-green'; // Define your CSS class for green color here
        default:
            return ''; // Default class if status doesn't match
    }
}
?>
<style>
    #i {
        margin-left: 600px;
    }

    .status-yellow {
        color: hotpink;
        font-weight: bold;
    }

    .status-blue {
        color: blue;
        font-weight: bold;
    }

    .status-brown {
        color: brown;
        font-weight: bold;
    }

    .status-red {
        color: red;
        font-weight: bold;
    }

    .status-green {
        color: green;
        font-weight: bold;
    }
</style>

<body>
    <div class="container-fluid px-4">
        <h1 class="mb-4" id="i">Infor My Bill</h1>
        <div class="card mb-4">
            <div class="card-body" id="t">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id_bill</th>
                            <th>Date_order</th>
                            <th>Count_products</th>
                            <th>Total_bills</th>
                            <th>Status_bill</th>
                            <th>Bill_detail</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php
                    if (is_array($listbill)) {
                        foreach ($listbill as $bill) {
                            extract($bill);
                            // $ttdh = get_ttdh($bill['id_status_bill']);
                            $countsp = loadall_cart_count($id_bill);
                            $ctb = "index.php?act=bill_detail&id_bill=" . $id_bill;
                            $huydh = "index.php?act=update_bill&id_bill=" . $id_bill;
                            $ship = 100;
                            $total_price += $ship;
                            if ($id_status_bill != 1) {
                                $huydh = ''; // Không hiển thị nút xóa cho admin
                            } else {
                                $huydh = '<a href="' . $huydh . '" class="btn btn-danger"><input type="button" value="Unset bill" onclick ="return confirm(\'ban co chac chan muon huy don hang?\')" /></a>';
                            }
                            echo ' <tr>
                            <td>' . $id_bill . '</td>
                            <td>' . $date_order . '</td>
                            <td>' . $countsp . '</td>
                            <td>' . number_format($total_price, 0, ",", ".") . '$' . '</td>
                            <td class="' . getStatusColorClass($name_status) . '">' . $name_status . '</td>
                            <td><a href="' . $ctb . '" class="btn btn-primary"><input type="button" value="See detail" /></a></td>
                            <td> ' . $huydh . '
                          </td>
                                     </tr>';
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>