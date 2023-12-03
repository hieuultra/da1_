<html>

<head>demo api tao qr thnah toan momo tu he thong ziller.vn</head>

<body>
  <?php
  if ($_POST['ziller']) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://bio.ziller.vn/api/qr/add",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 2,
      CURLOPT_TIMEOUT => 10,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer 93f90968363b8939381923c80183a8ef",
        "Content-Type: application/json",
      ),
      CURLOPT_POSTFIELDS => json_encode(array(
        'type' => 'link',
        'data' => 'https://google.com',
        'background' => 'rgb(255,255,255)',
        'foreground' => 'rgb(0,0,0)',
        'logo' => 'https://site.com/logo.png',
      )),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    // var_dump($response);
    $huy = json_decode($response);
  }

  ?>
  <form action="" method="post">
    <label for="huyplay">std chuyen den</label>
    <input type="text" name="sdt" id="">
    <br>
    <label for="huyplay">so tien</label>
    <input type="text" name="st" id="">
    <br>
    <label for="huyplay">noi dung</label>
    <input type="text" name="nd" id="">
    <br>
    <label for="huyplay">mau qr</label>
    <input type="text" name="cl" id="">
    <br>
    <label for="huyplay">mau nen qr</label>
    <input type="text" name="bg" id="">
    <br>
    <label for="huyplay">link logo</label>
    <input type="text" name="logo" id="">
    <br>
    <input type="submit" value="tao qr" name="ziller">
  </form>
</body>
<img src="<?= $huy->link; ?>" alt="">
2|99|sdtmomo|TRUONG DAN HUY||0|0|sotien|noidung|transfer_myqr

</html>