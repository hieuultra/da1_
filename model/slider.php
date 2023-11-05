<?php
function insert_slider($file, $name_slider)
{
    $sql = "insert into slider(img_slider,name_slider) values('$file','$name_slider')";
    pdo_execute($sql);
}

// function delete_cat($id_cat)
// {
//     $sql = "delete from category where id_cat=" . $id_cat;
//     pdo_execute($sql);
// }
function loadall_slider()
{
    $sql = "select * from slider order by id_slider desc";
    $dssl = pdo_query($sql);
    return $dssl; //co ket qua tra ve phai return
}
