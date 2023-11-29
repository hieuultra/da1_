<?php
// if (is_array($bc)) {
//     extract($bc);
//     // var_dump($bc);
// }
// foreach ($bc as $b) {
//     extract($b);
//     // var_dump($b);
// }
?>
<style>
    #s {
        font-size: 20px;
        font-weight: bold;
        color: red;
    }
</style>
<div class="container-fluid mt-4 px-4">
    <h1 class="mt-4">Update bill</h1>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Infor_user</h5>
                <h6 class="card-subtitle mb-2 text-muted">Name_user:<?= $suabi[0]['name_user'] ?></h6>
                <p class="card-text">Phone_user:<?= $suabi[0]['phone_user'] ?></p>
                <p class="card-text">Address_user:<?= $suabi[0]['address_user'] ?></p>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total_price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($suabi as $s) {
                    extract($s);
                    // var_dump($s);
                    $total_order = 0;
                    $s['price_pro'] =  $s['price_pro'] - (($s['price_pro'] *  $s['discount']) / 100);
                    $s['total'] = $s['price_pro'] * $s['quantity'];
                    //  $b['total_cart'] += $s['total'];
                    // $total_order = loadall_st($id_bill);                
                    // $s['total_order'] = $s[0]['total']+ $s[1]['total'];
                    // $suasp = "index.php?act=edit_pro&id_pro=" . $s['id_pro'];
                    // $xoasp = "index.php?act=delete_cart&id_pro=" . $s['id_pro'];
                    $hinhpath = "../upload/" . $s['image_pro'];
                    if (is_file($hinhpath)) {
                        $hinh = "<img src='" . $hinhpath . "' height='70'>";
                    } else {
                        $hinh = "No photo";
                    }
                ?>
                    <tr>
                        <td>
                            <?= $s['name_pro'] ?>
                        </td>
                        <td><?= $hinh ?></td>
                        <td><?= number_format($s['price_pro'], 0, ",", ".") ?>$</td>
                        <td><?= $s['quantity'] ?></td>
                        <td><?= number_format($s['total'], 0, ",", ".") ?>$</td>
                        <!-- <td>
                            <form action="?act=edit_q" id="<?= $s['id_cart'] ?>" method="post">
                                <input type="hidden" name="id_cart" value="<?= $s['id_cart'] ?>">
                                <input type="hidden" name="id_bill" value="<?= $s['id_bill'] ?>">
                                <input type="submit" value="Update" class="btn btn-primary" name="ss" />
                            </form>
                        </td> -->
                    </tr>

                <?php } ?>
                <tr>
                    <td colspan="4">Total order</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="align-middle"><?= number_format($s['total_price'], 0, ",", ".") ?>$</td>
                </tr>
            </tbody>
        </table>

        <form action="?act=update_bill" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_bill" value="<?= $suabi[0]['id_bill'] ?>">
            <div class="mb-3">
                <label class="form-label" id="s">Status_bill</label>
                <select class="form-select" name="id_status_bill">
                    <option value="0" selected>All</option>
                    <?php
                    foreach ($dsst as $ds) {
                        if ($ds['id_status_bill'] == $suabi[0]['id_status_bill']) $s = "selected";
                        else $s = "";
                        echo '<option value="' . $ds['id_status_bill'] . '" ' . $s . '>' . $ds['name_status'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Update" name="edit">
            <a href="?act=list_bill">
                <input type="button" class="btn btn-primary" value="LIST_BILL">
            </a>
        </form>
    </div>
</div>