<?php
function insert_bl($content, $date_com, $id_user, $id_pro)
{
    $sql = "insert into comment(content, date_com, id_user, id_pro) values('$content','$date_com','$id_user','$id_pro')";
    pdo_execute($sql);
}

function delete_bl($id_com)
{
    $sql = "delete from comment where id_com=" . $id_com;
    pdo_execute($sql);
}
function loadall_comment($id_pro)
{
    $sql = "SELECT bl.content,bl.date_com,tk.name as nguoibl,sp.name_pro,bl.id_pro,bl.id_com
    from product sp INNER join comment bl on sp.id_pro=bl.id_pro
    INNER join user tk on bl.id_user=tk.id_user where 1";
    if ($id_pro > 0)
        $sql .= " and bl.id_pro='" . $id_pro . "'";
    // $sql .= " and bl.id_bl=  " . $id_bl;
    $sql .= " order by bl.id_com desc ";

    $ctbl = pdo_query($sql);
    return $ctbl; //co ket qua tra ve phai return
}
function loadall_bl()
{
    $sql = "SELECT pro.name_pro,COUNT(bl.id_com) as sobl,bl.id_pro, bl.date_com, MAX(bl.date_com) as moinhat, min(bl.date_com) as cunhat,bl.id_com
    from product pro INNER join comment bl on pro.id_pro=bl.id_pro
    INNER join user tk on bl.id_user=tk.id_user GROUP by bl.id_pro ";

    $dsbl = pdo_query($sql);
    return $dsbl; //co ket qua tra ve phai return
}
function loadall_bll($id_pro)
{
    $sql = "SELECT c.*,u.username,p.name_pro from comment c join user u on c.id_user=u.id_user join product p on c.id_pro=p.id_pro where 1";
    if ($id_pro > 0)
        $sql .= " and c.id_pro='" . $id_pro . "'";
    $sql .= " order by id_com desc ";

    $ds = pdo_query($sql);
    return $ds; //co ket qua tra ve phai return
}
function loadone_probl($id_pro)
{
    $sql = "select * from product sp join comment bl on sp.id_pro=bl.id_pro where bl.id_pro=" . $id_pro;
    $pro = pdo_query_one($sql);
    return $pro; //co ket qua tra ve phai return
}
// function loadone_dm($id_dm)
// {
//     $sql = "select * from danhmuc where id_dm=" . $id_dm;
//     $suadm = pdo_query_one($sql);
//     return $suadm; //co ket qua tra ve phai return
// }
// function update_dm($nameloai, $id_dm)
// {
//     $sql = "update danhmuc set name='" . $nameloai . "' where id_dm=" . $id_dm;
//     pdo_execute($sql);
// }
