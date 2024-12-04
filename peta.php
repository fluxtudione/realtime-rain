<?php
header('Content-Type: application/json');

// Koneksi ke MySQL
$host = 'localhost';
$username = 'root';
$password = '';
$databases = [
    'arg_db' => 39, // 39 alat dengan prefix arg_
    'aws_db' => 10, // 10 alat dengan prefix aws_
    // 'aaws_db' => 3  // 3 alat dengan prefix aaws_
];

// Lokasi manual (latitude, longitude) untuk setiap alat
$locations = [
    'arg_banjarsari' => ['lat' => -6.493481, 'lng' => 106.015454],
    'arg_banjaririgasi' => ['lat' => -6.569224, 'lng' => 106.411325],
    'arg_menes' => ['lat' => -6.376694, 'lng' => 105.92],
    'arg_rphcilegon' => ['lat' => -6.0040262, 'lng' => 106.0850053],
    'arg_tirtayasa' => ['lat' => -6.024102, 'lng' => 106.32961],
    'arg_kramatwatu' => ['lat' => -6.060724, 'lng' => 106.130983],
    'arg_bppbalaraja' => ['lat' => -6.156485, 'lng' => 106.418242],
    'arg_kresek' => ['lat' => -6.127633, 'lng' => 106.3802],
    'arg_mandalawangi' => ['lat' => -6.30984, 'lng' => 105.98895],
    'arg_mauk' => ['lat' => -6.0647, 'lng' => 106.53],
    'arg_cisalak' => ['lat' => -6.373468, 'lng' => 106.302063],
    'arg_rek_kemayoran' => ['lat' => -6.155415, 'lng' => 106.842308],
    'ph_digital_kibin' => ['lat' => -6.1301944, 'lng' => 106.3135556],
    'arg_cikeusal' => ['lat' => -6.260025, 'lng' => 106.27774],
    'arg_bppcimanuk' => ['lat' => -6.348996, 'lng' => 106.044],
    'arg_rek_stmkg' => ['lat' => -6.26518, 'lng' => 106.74872],
    'arg_rek_stageof' => ['lat' => -6.172, 'lng' => 106.647],
    'arg_bppsepatan' => ['lat' => -6.116474, 'lng' => 106.584349],
    'arg_rek_sobang' => ['lat' => -6.655726428, 'lng' => 106.3451195],
    'arg_bptphp_serang' => ['lat' => -6.041636, 'lng' => 106.2038],
    'ph_digital_tigaraksa' => ['lat' => -6.2956944, 'lng' => 106.4755556],
    'arg_rek_bojongmenteng' => ['lat' => -6.601787859, 'lng' => 106.2274353],
    'arg_cirinten' => ['lat' => -6.62840184, 'lng' => 106.1550015],
    'arg_ciganjur' => ['lat' => -6.3443, 'lng' => 106.799],
    'arg_pandeglang' => ['lat' => -6.28679, 'lng' => 106.125497],
    'arg_bendungciliman' => ['lat' => -6.611524, 'lng' => 105.95678],
    'arg_kebunbibitragunan' => ['lat' => -6.294698, 'lng' => 106.8214],
    'arg_smpkpanggarangan' => ['lat' => -6.907833, 'lng' => 106.1734],
    'arg_kelapagading' => ['lat' => -6.166633, 'lng' => 106.9136],
    'arg_lebakbulus' => ['lat' => -6.304318, 'lng' => 106.7774],
    'arg_ciomas' => ['lat' => -6.204, 'lng' => 106.0168],
    'arg_bppsukapura' => ['lat' => -6.1318080, 'lng' => 106.9574080],
    'arg_pulomas' => ['lat' => -6.1666, 'lng' => 106.8809],
    'arg_manggarai' => ['lat' => -6.20748, 'lng' => 106.8487],
    'arg_tomang' => ['lat' => -6.1666, 'lng' => 106.78],
    'arg_kembangan' => ['lat' => -6.174436, 'lng' => 106.732117],
    'arg_pakubuwono' => ['lat' =>-6.2331047 , 'lng' => 106.7931924],
    'arg_padarincang' => ['lat' => -6.220089, 'lng' => 105.933051],
    'arg_malingping' => ['lat' => -6.7675, 'lng' => 106.0106],

    // Tambahkan semua alat dari arg_db
    'aws_pik' => ['lat' => -6.116237, 'lng' => 106.745451],
    'aws_cibaliung' => ['lat' => -6.715603, 'lng' => 105.71]
    // Tambahkan semua alat dari aws_db
    // 'aaws_lebak' => ['lat' => -6.546103, 'lng' => 106.3906],
    // // Tambahkan semua alat dari aaws_db
];

// Pemetaan nama alat ke database tempat alat berada
$databaseMapping = [
'arg_banjarsari' => 'arg_db',  
'arg_banjaririgasi' => 'arg_db',  
'arg_menes' => 'arg_db',  
'arg_rphcilegon' => 'arg_db',  
'arg_tirtayasa' => 'arg_db',  
'arg_kramatwatu' => 'arg_db',  
'arg_bppbalaraja' => 'arg_db',  
'arg_kresek' => 'arg_db',  
'arg_mandalawangi' => 'arg_db',  
'arg_mauk' => 'arg_db',  
'arg_cisalak' => 'arg_db',  
'arg_rek_kemayoran' => 'arg_db',  
'ph_digital_kibin' => 'arg_db',  
'arg_cikeusal' => 'arg_db',  
'arg_bppcimanuk' => 'arg_db',  
'arg_rek_stmkg' => 'arg_db',  
'arg_rek_stageof' => 'arg_db',  
'arg_bppsepatan' => 'arg_db',  
'arg_rek_sobang' => 'arg_db',  
'arg_bptphp_serang' => 'arg_db',  
'ph_digital_tigaraksa' => 'arg_db',  
'arg_rek_bojongmenteng' => 'arg_db',  
'arg_cirinten' => 'arg_db',  
'arg_ciganjur' => 'arg_db',  
'arg_pandeglang' => 'arg_db',  
'arg_bendungciliman' => 'arg_db',  
'arg_kebunbibitragunan' => 'arg_db',  
'arg_smpkpanggarangan' => 'arg_db',  
'arg_kelapagading' => 'arg_db',  
'arg_lebakbulus' => 'arg_db',  
'arg_ciomas' => 'arg_db',  
'arg_pulomas' => 'arg_db',  
'arg_manggarai' => 'arg_db',  
'arg_tomang' => 'arg_db',  
'arg_kembangan' => 'arg_db',  
'arg_pakubuwono' => 'arg_db',  
'arg_padarincang' => 'arg_db',  
'arg_malingping' => 'arg_db',
'arg_bppsukapura'=> 'arg_db',  

    // Tambahkan alat dari arg_db
    'aws_pik' => 'aws_db',
    'aws_cibaliung' => 'aws_db'
    // Tambahkan alat dari aws_db
    // 'aaws_lebak' => 'aaws_db',
    // // Tambahkan alat dari aaws_db
];

// Hasil akhir
$results = [];

// Loop setiap alat
foreach ($locations as $tableName => $location) {
    // Tentukan database tempat alat berada
    $db = $databaseMapping[$tableName];

    // Koneksi ke database yang sesuai
    $conn = new mysqli($host, $username, $password, $db);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Memeriksa apakah kolom 'rr' ada di tabel
    $checkColumnQuery = "DESCRIBE $tableName";
    $checkResult = $conn->query($checkColumnQuery);
    $columns = [];
    while ($row = $checkResult->fetch_assoc()) {
        $columns[] = $row['Field'];
    }

    if (!in_array('rr', $columns)) {
        // Jika kolom 'rr' tidak ada, skip tabel ini
        continue;
    }

    $query = "
    SELECT 
        site, 
        id_sta, 
        time_received, 
        rr
    FROM $tableName
    WHERE time_received = (
        SELECT MAX(time_received) FROM $tableName
    )
";


    $data = $conn->query($query);

    if ($data && $data->num_rows > 0) {
        while ($row = $data->fetch_assoc()) {
            error_log(print_r($row, true));
           
            $results[] = [
                'site' => $row['site'] ?: 'Unknown Site', 
                'id_sta' => $row['id_sta'] ?: 'Unknown ID', 
                'time_received' => $row['time_received'] ?: 'No Data', 
                'rr' => $row['rr'] ?: 0, 
                'lat' => $location['lat'], 
                'lng' => $location['lng']
            ];
             
        }
    }

    $conn->close();
}

// Output data dalam format JSON
echo json_encode($results);
?>
