<?php
function insert_slider($file, $name_slider)
{
    $sql = "insert into slider(img_slider,name_slider) values('$file','$name_slider')";
    pdo_execute($sql);
}

function delete_slider($id_slider)
{
    $sql = "delete from slider where id_slider=" . $id_slider;
    pdo_execute($sql);
}
function loadall_slider()
{
    $sql = "select * from slider order by id_slider desc";
    $dssl = pdo_query($sql);
    return $dssl; //co ket qua tra ve phai return
}
