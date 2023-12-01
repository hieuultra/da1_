<style>
    #x {
        width: 40px;
    }
</style>
<?php
//     for ($i = 0; $i < sizeof($_SESSION['mycart']); $i++) {
//         $total =  $_SESSION['mycart'][$i][3] * $_SESSION['mycart'][$i][5];
//         echo '<tr>
//       <td><img src="' . $_SESSION['mycart'][$i][2] . '" height="80px"></td>
//       <td>' . $_SESSION['mycart'][$i][1] . '</td>
//       <td>' . $_SESSION['mycart'][$i][3] . '</td>
//       <td>' . $_SESSION['mycart'][$i][5] . '</td>
//       <td>' . $total . '</td>
//   </tr>';
//     }
// var_dump($_SESSION['mycart']);
// _' . $cart['id'] . ': de sau id_pro
function view_cart($del)
{
    global  $img_path;
    $tong = 0;
    $i = 0;
    if ($del == 1) {
        $xoasp_th = '<th colspan="2">Action</th>';
        $edit = '';
        $xoasp_td2 = '';
    } else {
        $xoasp_th = "";
        $edit = '';
        $xoasp_td2 = "";
    }
    echo '   <thead class="bg-secondary text-dark">
    <tr>
    <th>Image</th>
    <th>Products</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total</th>
 ' . $xoasp_th . '
</tr>
</thead>';

    foreach ($_SESSION['mycart'] as $key => $cart) {
        $hinh = $img_path . $cart['image'];
        // $gia = $cart[3];
        $price =  $cart['price'] - (($cart['price'] *  $cart['discount']) / 100);
        $total = $price * $cart['quantity'];
        $tong += $total;

        if ($del == 1) {
            $xoasp_td = '<td><a href="index.php?act=delcart&id_cart=' . $key . '">
            <input class="btn btn-danger" type="button" value="Remove" onclick ="return confirm(\'ban co chac chan muon xoa?\')" /></a>
                <input type="hidden" name="id_pro" value="' . $cart['id'] . '">
                <input type="hidden" name="name_pro" value="' . $cart['name'] . '">
                <input type="hidden" name="img" value="' . $cart['image'] . '">
                <input type="hidden" name="price" value="' . $cart['price'] . '">
                <input type="hidden" name="discount" value="' . $cart['discount'] . '">
                </td>';
            $edit = '<td><input type="submit" value="Update" class="btn btn-primary" name="ss"></td>  ';
        } else {
            $xoasp_td = "";
            $edit = "";
        }
        echo '  <tbody class="align-middle">
           <tr> <form action="?act=edit_sc" method="post">
            <td><img src="' . $hinh . '" alt="" height="80px"></td>
            <td class="align-middle">' . $cart['name'] . '</td>
            <td class="align-middle">' . number_format($price, 0, ",", ".") . '$</td>
            <td class="align-middle"><a onclick="giam(this)"></a><input name="quantity" value="' . $cart['quantity'] . '" id="x"><a onclick="tang(this)" ></a><input type="hidden" value="' . $i . '" /></td>
            <td class="align-middle">' . number_format($total, 0, ",", ".") . '$</td>
           ' . $xoasp_td . '
                 ' . $edit . '
           </form>
           </tr>  
           </tbody>    
        ';
        $i += 1;
    }
    echo '
    <td colspan="4">Total order</td>
    <td class="align-middle">' . number_format($tong, 0, ",", ".") . '$</td>
    ' . $xoasp_td2 . '
    
    ';
}
function update_bill($id_bill, $id_status_bill)
{

    $sql = "update bill set id_status_bill='" . $id_status_bill . "' where id_bill=" . $id_bill;
    pdo_execute($sql);
}
function edit_cart($id_cart, $quantity, $id_bill)
{
    $sql = "update cart set quantity='" . $quantity . "' where id_bill=" . $id_bill . " and id_cart=" . $id_cart;
    pdo_execute($sql);
}
function loadall_st($id_bill)
{
    $sql = "SELECT total * quantity AS total_cart FROM cart WHERE id_bill = " . $id_bill;
    $bc = pdo_query($sql);
    return $bc; //co ket qua tra ve phai return
}
function loadall_bc()
{
    $sql = "select * from bill b join cart c on b.id_bill=c.id_bill";
    $bc = pdo_query($sql);
    return $bc; //co ket qua tra ve phai return
}
// function show_ctdh($listbill) //bien truyen vao ko lien quan den bien ben ngoai
// {
//     global  $img_path;
//     $tong = 0;
//     $i = 0;

//     echo '<tr>
//     <th>Hình</th>
//     <th>Tên sản phẩm</th>
//     <th>Giá</th>
//     <th>Số lượng</th>
//     <th>Thành Tiền</th>

// </tr>';
//     foreach ($listbill as $cart) {
//         $hinh = $img_path . $cart['img'];
//         // $tong += $cart['thanhtien'];
//         echo ' 
//        <tr> 
//         <td><img src="' . $hinh . '" alt="" height="80px"></td>
//         <td>' . $cart['name'] . '</td>
//         <td>$' . number_format($cart['price'], 0, ",", ".") . '</td>
//         <td>' . $cart['soluong'] . '</td>
//         <td>$' . number_format($cart['thanhtien'], 0, ",", ".") . '</td>

//        </tr> 
//     ';
//         $i += 1;
//     }
//     foreach ($_SESSION['mycart'] as $cart) {
//         // $gia = $cart[3];
//         $gia =  $cart[3] - (($cart[3] *  $cart[4]) / 100);
//         $thanhtien = $gia * $cart[5];
//         $tong += $thanhtien;
//     }
//     echo '
//         <tr> 
//         <td colspan="4">Tổng đơn hàng</td>

//         <td>$' . number_format($tong, 0, ",", ".") . '</td>
//         </tr> 
//         ';
// }

function tongdh()
{

    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $gia =  $cart['price'] - (($cart['price'] *  $cart['discount']) / 100);
        $thanhtien = $gia * $cart['quantity'];
        $tong += $thanhtien;
    }
    return $tong;
}

function insert_bill($name_user, $address_user, $phone_user, $email_user, $total_price, $payment_method, $date_order, $id_user)
{
    $sql = "insert into bill(name_user,address_user,phone_user,email_user,total_price,payment_method,date_order,id_user) 
    values('$name_user','$address_user','$phone_user','$email_user','$total_price','$payment_method','$date_order','$id_user')";
    return pdo_execute_return_lastInsertId($sql); // insert xong tra ve id vua insert de insert vao table cart
}
function delete_bil($id_bill)
{
    $sql = "delete from bill where id_bill=" . $id_bill;
    pdo_execute($sql);
}
function insert_cart($image_pro, $name_pro, $price_pro, $total, $quantity, $id_pro, $id_bill, $id_user)
{
    $sql = "insert into cart(image_pro, name_pro, price_pro, total, quantity, id_pro, id_bill,id_user) 
    values('$image_pro', '$name_pro', '$price_pro', '$total', '$quantity', '$id_pro', '$id_bill','$id_user')";
    pdo_execute($sql);
}
function loadone_bill($id_bill)
{
    $sql = "select * from bill where id_bill=" . $id_bill;
    $bill = pdo_query_one($sql);
    return $bill; //co ket qua tra ve phai return
}
function loadall_b($id_bill)
{
    $sql = "select * from bill b join cart c on b.id_bill=c.id_bill join product p on c.id_pro=p.id_pro where b.id_bill=" . $id_bill;
    $bill = pdo_query($sql);
    return $bill; //co ket qua tra ve phai return
}
function loadone_b_c($id_bill)
{
    $sql = "select * from cart where id_bill=" . $id_bill;
    $bill = pdo_query_one($sql);
    return $bill; //co ket qua tra ve phai return
}

function loadall_cart($id_bill)
{
    $sql = "select * from cart where id_bill=" . $id_bill;
    $bill = pdo_query($sql);
    return $bill; //co ket qua tra ve phai return
}
function loadall_cart_count($id_bill)
{
    $sql = "select * from cart where id_bill=" . $id_bill;
    $bill = pdo_query($sql);
    return sizeof($bill); //dem so lg mat hang
}
function loadall_bill()
{
    $sql = "select *,sum(c.quantity) as sum_quantity from bill b join cart c on b.id_bill=c.id_bill
     join status_bill s on b.id_status_bill=s.id_status_bill join product p on c.id_pro=p.id_pro where 1";
    $sql .= " group by c.id_bill order by b.id_bill desc";
    $listbill = pdo_query($sql);
    return $listbill; //co ket qua tra ve phai return
}
function loadall_bil($id_user)
{
    $sql = "select * from bill b join cart c on b.id_bill=c.id_bill join status_bill s on b.id_status_bill=s.id_status_bill where 1";
    if ($id_user > 0) $sql .= "  and b.id_user=" . $id_user;
    $sql .= "  group by b.id_bill order by b.id_bill desc";
    $listbill = pdo_query($sql);
    return $listbill; //co ket qua tra ve phai return
}
function loadall_tk_bil($id_user)
{
    $sql = "select * from bill b join cart c on b.id_bill=c.id_bill join status_bill s on b.id_status_bill=s.id_status_bill where 1";
    if ($id_user > 0) $sql .= "  and b.id_user=" . $id_user;
    $sql .= "  group by b.id_bill order by b.id_bill desc";
    $listbill = pdo_query($sql);
    return $listbill; //co ket qua tra ve phai return
}
function loadall_bi($id_user)
{
    $sql = "select * from bill b join cart c on b.id_bill=c.id_bill where 1";
    if ($id_user = 0) $sql .= "  and b.id_user=" . $id_user;
    $sql .= "  group by b.id_bill order by b.id_bill desc";
    $listbill = pdo_query($sql);
    return $listbill; //co ket qua tra ve phai return
}
function delete_bill($id_bill)
{
    $sql = "delete from bill where id_bill=" . $id_bill;
    pdo_execute($sql);
}
function get_filter($filter)
{
    switch ($filter) {
        case '1':
            $sql = "SELECT * FROM product WHERE price BETWEEN 0 AND 10000";
            break;
        case '2':
            $sql = "SELECT * FROM product WHERE price BETWEEN 10000 AND 20000";
            break;
        case '3':
            $sql = "SELECT * FROM product WHERE price BETWEEN 20000 AND 50000";
            break;
        case '4':
            $sql = "SELECT * FROM product WHERE price BETWEEN 50000 AND 100000";
            break;
        case '5':
            $sql = "SELECT * FROM product WHERE price >100000";
            break;
        default:
            $sql = "SELECT * FROM product";
            break;
    }
    return pdo_query($sql);
}
function get_pttt($n)
{
    switch ($n) {
        case '1':
            $pt = "Paypal";
            break;
        case '2':
            $pt = "Direct check";
            break;
        case '3':
            $pt = "Bank transfer";
            break;

        default:
            $pt = "Direct check";
            break;
    }
    return $pt;
}
function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = "DON HANG MOI";
            break;
        case '1':
            $tt = "DANG XU LY";
            break;
        case '2':
            $tt = "DANG GIAO HANG";
            break;
        case '3':
            $tt = "DA GIAO HANG";
            break;

        default:
            $tt = "DON HANG MOI";
            break;
    }
    return $tt;
}
function  loadall_thongke()
{
    $sql = "select danhmuc.name as tendanhmuc,danhmuc.id_dm as madanhmuc,count(sanpham.id_sp) as countsp, min(sanpham.price) as mingia,max(sanpham.price) as maxgia, avg(sanpham.price) as giatb ";

    $sql .= "  from sanpham join danhmuc on sanpham.id_dm=danhmuc.id_dm ";
    $sql .= " group by danhmuc.id_dm order by danhmuc.id_dm desc ";
    $listtk = pdo_query($sql);
    return $listtk;
}
function loadall_sp_cart($id_bill)
{
    $sql = "select * from cart c join product p on c.id_pro=p.id_pro where id_bill=" . $id_bill;
    $spbill = pdo_query($sql);
    return $spbill; //co ket qua tra ve phai return
}
function update_bil($id_bill)
{
    $sql = "update bill set id_status_bill=5 where id_bill=" . $id_bill;
    pdo_execute($sql);
}
function loadall_status_bill()
{

    //cach noi chuoi sql
    //phai co cach khoang
    $sql = "select * from status_bill where 1 order by id_status_bill desc";
    $dsst = pdo_query($sql);
    return $dsst; //co ket qua tra ve phai return


}


?>
<script>
    function tang(x) {
        //thay doi so luong truc tiep voi DOM HTML
        var cha = x.parentElement;
        var soluongcu = cha.children[1];
        var soluongmoi = parseInt(soluongcu.innerText) + 1;
        soluongcu.innerText = soluongmoi;
        var vitri = cha.children[3];
        // alert(soluongcu);

        //goi ham cap nhap session

    }

    function giam(x) {
        //thay doi so luong truc tiep voi DOM HTML
        var cha = x.parentElement;
        var soluongcu = cha.children[1];
        if (parseInt(soluongcu.innerText) > 1) {
            var soluongmoi = parseInt(soluongcu.innerText) - 1;
            soluongcu.innerText = soluongmoi;


        } else {
            alert("Order Product have >= 1");
        }

        // alert(soluongcu);

        //goi ham cap nhap session

    }
</script>