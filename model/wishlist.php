<?php
function view_wishlist($delwishlist)
{
    global  $img_path;

    $i = 0;
    if ($delwishlist == 1) {
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
    //     for ($i = 0; $i < sizeof($_SESSION['mywl']); $i++) {
    //         $total =  $_SESSION['mywl'][$i][3] * $_SESSION['mywl'][$i][5];
    //         echo '<tr>
    //       <td><img src="' . $_SESSION['mywl'][$i][2] . '" height="80px"></td>
    //       <td>' . $_SESSION['mywl'][$i][1] . '</td>
    //       <td>' . $_SESSION['mywl'][$i][3] . '</td>
    //       <td>' . $_SESSION['mywl'][$i][5] . '</td>
    //       <td>' . $total . '</td>
    //   </tr>';
    //     }
    foreach ($_SESSION['wishlist'] as $wl) {
        
        $hinh = $img_path . $wl[2];
        // $gia = $wl[3];
        $price =  $wl[3] - (($wl[3] *  $wl[4]) / 100);
        if ($delwishlist == 1) {

            $xoasp_td = '<td><a href="index.php?act=delwl&id=' . $i . '">
                <input class="btn btn-danger" type="button" value="Remove" onclick ="return confirm(\'ban co chac chan muon xoa?\')" /></a>
                </td>';
        } else {
            $xoasp_td = "";
        }
        echo '  <tbody class="align-middle" >
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