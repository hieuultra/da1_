<?php
function insert_brand($name_brand, $file)
{
    $sql = "insert into brand(name_brand,img) values('$name_brand','$file')";
    pdo_execute($sql);
}
function loadall_brand()
{
    $sql = "select * from brand order by id_brand desc ";
    $dsbr = pdo_query($sql);
    return $dsbr;
}
function delete_brand($id_brand)
{
    $sql = "delete from brand where id_brand=" . $id_brand;
    pdo_execute($sql);
}

function loadone_brand($id_brand)
{
    $sql = "select * from brand where id_brand=" . $id_brand;
    $suabr = pdo_query_one($sql);
    return $suabr; //co ket qua tra ve phai return
}
function update_brand($name_brand, $file, $id_brand)
{
    if ($file != "") {
        $sql = "update brand set name_brand='" . $name_brand . "' ,img='" . $file . "' where id_brand=" . $id_brand;
    } else {
        $sql = "update brand set name_brand='" . $name_brand . "' where id_brand=" . $id_brand;
    }

    pdo_execute($sql);
}
