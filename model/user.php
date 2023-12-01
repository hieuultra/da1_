<?php
function insert_tk($username, $password, $name, $address, $phone, $email, $file)
{
    $sql = "insert into user(username,password,name,address,phone,email,image)
     values('$username','$password','$name','$address','$phone','$email','$file')";
    pdo_execute($sql);
}
function  insert_tk_bill($name_user, $name,  $address_user, $phone_user, $email_user)
{
    $sql = "insert into user(username,name,address,phone,email)
     values('$name_user','$name','$address_user','$phone_user','$email_user')";
    return pdo_execute_return_lastInsertId($sql);
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
    $suasp = pdo_query_one($sql);
    return $suasp; //co ket qua tra ve phai return
}
function  update_tk($id_user, $username, $name, $address, $phone, $email, $file, $id_role)
{
    if ($file != '') {
        $sql = "update user set username='" . $username . "',name='" . $name . "',address='" . $address . "',
        phone='" . $phone . "',email='" . $email . "',image='" . $file . "',id_role='" . $id_role . "' where id_user=" . $id_user;
    } else {
        $sql = "update user set username='" . $username . "',name='" . $name . "',address='" . $address . "',
        phone='" . $phone . "',email='" . $email . "',id_role='" . $id_role . "' where id_user=" . $id_user;
    }

    pdo_execute($sql);
}
function insert_taikhoan($username, $password, $name, $address, $phone, $email, $file)
{
    $sql = "insert into user(username,password,name,address,phone,email,image)
     values('$username','$password','$name','$address','$phone','$email','$file')";
    pdo_execute($sql);
}
function insert_fb($name_user, $email_user, $phone_user, $subject_name, $content, $created_at)
{
    $sql = "insert into feedback(name_user, email_user, phone_user, subject_name,content,created_at)
     values('$name_user', '$email_user', '$phone_user', '$subject_name','$content','$created_at')";
    pdo_execute($sql);
}
function loadall_fb()
{
    $sql = "select * from feedback f join status_fb s on f.id_status_fb=s.id_status_fb order by id desc";
    $dsfb = pdo_query($sql);
    return $dsfb; //co ket qua tra ve phai return
}
function delete_fb($id)
{
    $sql = "delete from feedback where id=" . $id;
    pdo_execute($sql);
}
function loadone_fbb($id)
{
    $sql = "select * from feedback  where id=" . $id;
    $fb = pdo_query_one($sql);
    return $fb; //co ket qua tra ve phai return
}
function loadall_status_fb()
{
    //cach noi chuoi sql
    //phai co cach khoang
    $sql = "select * from status_fb where 1 order by id_status_fb desc";
    $dsstfb = pdo_query($sql);
    return $dsstfb; //co ket qua tra ve phai return
}
function update_fb($id, $id_status_fb)
{

    $sql = "update feedback set id_status_fb='" . $id_status_fb . "' where id=" . $id;
    pdo_execute($sql);
}
