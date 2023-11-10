<?php
function insert_tk($username, $password, $name, $address, $phone, $email, $file)
{
    $sql = "insert into user(username,password,name,address,phone,email,image)
     values('$username','$password','$name','$address','$phone','$email','$file')";
    pdo_execute($sql);
}
function check_user($username, $password)
{
    $sql = "select * from user where username='" . $username . "' AND password='" . $password . "'";
    $sp = pdo_query_one($sql);
    return $sp;
    // return pdo_query_all($sql); //co ket qua tra ve phai return
}
function update_taikhoan($id_user, $username, $password, $name, $address, $phone, $email, $file)
{
    if ($file != '') {
        $sql = "update user set username='" . $username . "',password='" . $password . "',
        name='" . $name . "',address='" . $address . "',phone='" . $phone . "',
        email='" . $email . "',image='" . $file . "' where id_user=" . $id_user;
    } else {
        $sql = "update user set username='" . $username . "',password='" . $password . "',
        name='" . $name . "',address='" . $address . "',phone='" . $phone . "',
        email='" . $email . "' where id_user=" . $id_user;
    }

    pdo_execute($sql);
}
function check_email($email)
{
    $sql = "select * from user where email='" . $email . "'";
    $sp = pdo_query_one($sql);
    return $sp;
    // return pdo_query_all($sql); //co ket qua tra ve phai return
}
function loadall_account()
{
    $sql = "select * from user u join role rl on u.id_role=rl.id_role order by u.id_user desc";
    $dstk = pdo_query($sql);
    return $dstk; //co ket qua tra ve phai return
}
function delete_acc($id_user)
{
    $sql = "delete from user where id_user=" . $id_user;
    pdo_execute($sql);
}
function loadone_acc($id_user)
{
    $sql = "select * from user where id_user=" . $id_user;
    $suatk = pdo_query_one($sql);
    return $suatk; //co ket qua tra ve phai return
}
function  update_acc($id_user, $username, $password, $name, $address, $phone, $email, $file, $id_role)
{
    if ($file != '') {
        $sql = "update user set username='" . $username . "',password='" . $password . "',
        name='" . $name . "',address='" . $address . "',phone='" . $phone . "',
        email='" . $email . "',image='" . $file . "',id_role='".$id_role."' where id_user=" . $id_user;
    } else {
        $sql = "update user set username='" . $username . "',password='" . $password . "',
        name='" . $name . "',address='" . $address . "',phone='" . $phone . "',
        email='" . $email . "',id_role='".$id_role."' where id_user=" . $id_user;
    }

    pdo_execute($sql);
}
function insert_acc($username, $password, $name, $address, $phone, $email, $file)
{
    $sql = "insert into user(username,password,name,address,phone,email,image)
     values('$username','$password','$name','$address','$phone','$email','$file')";
    pdo_execute($sql);
}

