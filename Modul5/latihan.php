<?php
$data = [
    [
        "nama" => "Romi",
        "asal" => "Bogor",
        "umur" => 22
    ],
    [
        "nama" => "Anto",
        "asal" => "Depok",
        "umur" => 23
    ],
    [
        "nama" => "Putri",
        "asal" => "Bangka",
        "umur" => 21
    ]
];

foreach ($data as $item) {
    echo $item['nama'] . "<br>";
    echo "Asal : " . $item['asal'] . "<br>";
    echo "Umur : " . $item['umur'] . "<br><br>";
}
?>