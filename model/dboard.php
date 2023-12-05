<?php
function count_sp()
{
    $sql = "select count(id_pro) as count_sp from product ";
    // $sql .= "  from sanpham join danhmuc on sanpham.id_dm=danhmuc.id_dm ";
    // $sql .= " group by danhmuc.id_dm order by danhmuc.id_dm desc ";
    $countsp = pdo_query($sql);
    return $countsp;
}
function sum_total_pr()
{
    $sql = "select sum(total_price) as sum_total from bill ";
    // $sql .= "  from sanpham join danhmuc on sanpham.id_dm=danhmuc.id_dm ";
    // $sql .= " group by danhmuc.id_dm order by danhmuc.id_dm desc ";
    $sum = pdo_query($sql);
    return $sum;
}
function sum_user_b()
{
    $sql = "SELECT COUNT(id_user) AS sum_user FROM (
        SELECT DISTINCT id_user FROM bill
    ) AS unique_users; ";
    // $sql .= "  from sanpham join danhmuc on sanpham.id_dm=danhmuc.id_dm ";
    // $sql .= " group by danhmuc.id_dm order by danhmuc.id_dm desc ";
    $sum_user = pdo_query($sql);
    return $sum_user;
}
function quantity_pro()
{
    $sql = "select sum(quantity) as quantity_pro from cart ";
    // $sql .= "  from sanpham join danhmuc on sanpham.id_dm=danhmuc.id_dm ";
    // $sql .= " group by danhmuc.id_dm order by danhmuc.id_dm desc ";
    $sum_quantity = pdo_query($sql);
    return $sum_quantity;
}
function getChartData()
{
    $sql = "SELECT date_order, SUM(quantity) AS total_sold FROM cart c join bill b
    on c.id_bill=b.id_bill GROUP BY c.id_pro";
    $data = pdo_query($sql);

    return $data;
}
function total1()
{
    $sql = "select  date_order, sum(total_price) as total from bill group by date_order";
    $total1 = pdo_query($sql);
    return $total1;
}
function total($date)
{
    $formattedDate = date("Y-m-d", strtotime($date));
    $sql = "SELECT DATE(date_order) AS date_only, SUM(total_price) AS total FROM bill WHERE DATE(date_order) = '$formattedDate' GROUP BY DATE(date_order)";
    $total = pdo_query($sql);
    return $total;
}
function sold()
{
    $sql = "select  b.date_order, sum(c.quantity) as quan from bill b join cart c on b.id_bill=c.id_bill group by date_order ";
    $totalsold = pdo_query($sql);
    return $totalsold;
}
function sold1($date)
{
    $formattedDate = date("Y-m-d", strtotime($date));
    $sql = "SELECT DATE(b.date_order) AS date_only, SUM(c.quantity) AS quan FROM bill b join cart c on b.id_bill=c.id_bill WHERE DATE(b.date_order) = '$formattedDate' GROUP BY DATE(b.date_order)";
    $totals = pdo_query($sql);
    return $totals;
}


function order_sold()
{
    $sql = "select  date_order, count(id_bill) as sold from bill group by date_order ";
    $totalsold = pdo_query($sql);
    return $totalsold;
}
function order_sold1($date)
{
    $formattedDate = date("Y-m-d", strtotime($date));
    $sql = "SELECT DATE(date_order) AS date_only, COUNT(id_bill) AS sold FROM bill  WHERE DATE(date_order) = '$formattedDate' GROUP BY DATE(date_order)";
    $totals = pdo_query($sql);
    return $totals;
}

