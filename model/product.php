<?php
function insert_pro($name_pro, $file, $des, $dis, $price, $id_cat, $id_brand)
{
    $sql = "insert into product(name_pro,img,description,discount,price,id_cat,id_brand) 
    values(' $name_pro ','$file','$des','$dis','$price','$id_cat','$id_brand')";
    pdo_execute($sql);
}

function delete_pro($id_pro)
{
    $sql = "delete from product where id_pro=" . $id_pro;
    pdo_execute($sql);
}
function loadall_pro_shop1()
{
    //cach noi chuoi sql
    //phai co cach khoang
    $sql = "select * from product where 1 order by id_pro desc limit 0,8";
    $sps = pdo_query($sql);
    return $sps; //co ket qua tra ve phai return
}
function loadall_pro_shop2()
{
    //cach noi chuoi sql
    //phai co cach khoang
    $sql = "select * from product where 1 order by id_pro desc limit 8,8";
    $sps = pdo_query($sql);
    return $sps; //co ket qua tra ve phai return
}
function loadall_pro_shop3()
{
    //cach noi chuoi sql
    //phai co cach khoang
    $sql = "select * from product where 1 order by id_pro desc limit 16,7";
    $sps = pdo_query($sql);
    return $sps; //co ket qua tra ve phai return
}

function loadall_pro_home()
{
    //cach noi chuoi sql
    //phai co cach khoang
    $sql = "select * from product where 1 order by id_pro desc limit 0,8";
    $dssp = pdo_query($sql);
    return $dssp; //co ket qua tra ve phai return
}

function loadall_pro_top8()
{
    //cach noi chuoi sql
    //phai co cach khoang
    $sql = "select * from product where 1 order by view desc limit 0,8";
    $dssp = pdo_query($sql);
    return $dssp; //co ket qua tra ve phai return
}
function loadall_pro_cat($id_cat = 0)
{
    //cach noi chuoi sql
    //phai co cach khoang
    $sql = "select * from product where 1";
    if ($id_cat > 0) {
        $sql .= " and id_cat = '" . $id_cat . "'";
    }

    $sql .= " order by id_pro desc";
    $dssp = pdo_query($sql);
    return $dssp; //co ket qua tra ve phai returnss
}

function loadall_pro($id_cat = 0)
{
    //cach noi chuoi sql
    //phai co cach khoang
    $sql = "select * from product pro join category cat on pro.id_cat = cat.id_cat join brand b on pro.id_brand=b.id_brand where 1";
    if ($id_cat > 0) {
        $sql .= " and pro.id_cat = '" . $id_cat . "'";
    }
    $sql .= " order by pro.id_pro desc";
    $dssp = pdo_query($sql);
    return $dssp; //co ket qua tra ve phai return
}
function loadone_pro($id_pro)
{
    $sql = "select * from product pro join size s on pro.id_size=s.id_size where id_pro=" . $id_pro;
    $suasp = pdo_query_one($sql);
    return $suasp; //co ket qua tra ve phai return
}
function load_ten_dm($id_cat)
{
    if ($id_cat > 0) {
        $sql = "select * from category where id_cat=" . $id_cat;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name_cat; //co ket qua tra ve phai return
    } else {
        return "";
    }
}
function update_pro($id_pro, $name_pro, $file, $description, $discount, $price, $id_cat, $id_brand)
{
    if ($file != "") {
        $sql = "update product set name_pro='" . $name_pro . "',img='" . $file . "',
        description='" . $description . "',discount='" . $discount . "',price='" . $price . "',
       id_cat='" . $id_cat . "',id_brand='" . $id_brand . "' where id_pro=" . $id_pro;
    } else {
        $sql = "update product set name_pro='" . $name_pro . "',
        description='" . $description . "',discount='" . $discount . "',price='" . $price . "',
        id_cat='" . $id_cat . "',id_brand='" . $id_brand . "' where id_pro=" . $id_pro;
    }

    pdo_execute($sql);
}
function loadone_sp_cungloai($id_pro, $id_cat)
{
    $sql = "select * from product where id_cat=" . $id_cat . " and id_pro <>" . $id_pro;
    $dssp = pdo_query($sql);
    return $dssp;; //co ket qua tra ve phai return
}
function tangluotxem($id_pro)
{
    $onesp = loadone_pro($id_pro);
    $view = $onesp['view'] + 1;
    $sql = "update product set view='" . $view . "' where id_pro =" . $id_pro;
    pdo_execute($sql);
}
function loadall_proo($kyw = "")
{
    //cach noi chuoi sql
    //phai co cach khoang
    $sql = "select * from product where 1";
    if ($kyw != "") {
        $sql .= " and name_pro like '%" . $kyw . "%' ";
    }
    $sql .= " order by id_pro desc";
    $sp = pdo_query($sql);
    return $sp; //co ket qua tra ve phai return
}
function checktrungsp($id_pro)
{
    $vitri = -1;
    for ($i = 0; $i < sizeof($_SESSION['mycart']); $i++) {
        if ($_SESSION['mycart'][$i][0] == $id_pro) {
            $vitri = $i;
        }
    }
    return $vitri;
}
function  update_quantity($vitri)
{
    for ($i = 0; $i < sizeof($_SESSION['mycart']); $i++) {
        if ($i == $vitri) {
            $_SESSION['mycart'][$i][5] += 1;
        }
    }
}
