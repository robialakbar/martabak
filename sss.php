<?php
    $curl = curl_init();
    $token = "";
    $data = [
        'phone' => '081XXXXXXX',
        'message' => 'hi',
        'date' => '2019-01-22',
        'time' => '14:30',
    ];

    curl_setopt($curl, CURLOPT_HTTPHEADER,
        array(
            "Authorization: $token",
        )
    );
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_URL, "https://teras.wablas.com/api/schedule");
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($curl);
    curl_close($curl);

    echo "<pre>";
    print_r($result);

    ?>