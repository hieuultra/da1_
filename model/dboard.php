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
function getChartData(){
    $sql = "SELECT date_order, SUM(quantity) AS total_sold FROM cart c join bill b
    on c.id_bill=b.id_bill GROUP BY c.id_pro";
    $data = pdo_query($sql);

    return $data;
}