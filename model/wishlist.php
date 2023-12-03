<?php
function view_wishlist($del)
{
    global  $img_path;
    $i = 0;
    if ($del == 1) {
        $xoasp_th = '<th>Action</th>';
    } else {
        $xoasp_th = "";
    }
    echo '   <thead class="bg-secondary text-dark">
    <tr>
    <th>Image</th>
    <th>Products</th>
    <th>Price</th>
 ' . $xoasp_th . '
</tr>
</thead>';
    foreach ($_SESSION['wishlist'] as $wl) {
        // extract($wl);
        $hinh = $img_path . $wl[2];
        // $gia = $wl[3];
        $price = floatval($wl[3]) - ((floatval($wl[3]) * floatval($wl[4])) / 100);

        if ($del == 1) {
            $xoasp_td = '<td><a href="index.php?act=delwl&id=' . $i . '">
                <input class="btn btn-danger" type="button" value="Remove" onclick ="return confirm(\'ban co chac chan muon xoa?\')" /></a>
               
            <form action="index.php?act=addtocart" method="post">
                <input type="hidden" name="id_pro" value="' . $wl[0] . '">
                <input type="hidden" name="name_pro" value="' . $wl[1] . '">
                <input type="hidden" name="img" value="' . $wl[2] . '">
                <input type="hidden" name="price" value="' . $wl[3] . '">
                <input type="hidden" name="discount" value="' . $wl[4] . '">
                <input type="submit" value="Add To Cart" class="btn btn-primary" name="addtocart">
            </form>
                </td>';
        } else {
            $xoasp_td = "";
        }
        echo '  <tbody class="align-middle">
           <tr> 
            <td><img src="' . $hinh . '" alt="" height="80px"></td>
            <td class="align-middle">' . $wl[1] . '</td>
            <td class="align-middle">' . number_format($price, 0, ",", ".") . '$</td>
          
             ' . $xoasp_td . '
           
           </tr> 
           </tbody>
          
        ';
        $i += 1;
    }
}
