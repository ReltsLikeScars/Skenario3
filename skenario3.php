<?php
$activities = [
    ['15:30', '15:45', 'Pulang sekolah dan tiba di rumah'],
    ['15:45', '16:00', 'Mandi'],
    ['16:00', '16:30', 'Mengaji'],
    ['16:30', '18:30', 'Mengerjakan tugas sekolah'],
    ['18:30', '19:00', 'Menghafalkan dialog untuk festival kesenian budaya'],
    ['19:00', '19:15', 'Membeli bumbu masakan'],
    ['19:15', '19:30', 'Sholat Maghrib'],
    ['19:30', '20:00', 'Makan malam'],
    ['20:00', '20:30', 'Chatting dengan Raya kiwkiw(Waktu di Arab: 16:00 - 16:30)'],
    ['20:30', '21:00', 'Mengobrol bersama keluarga / mengerjakan tugas sekolah'],
    ['21:00', '22:00', 'Waktu luang / mengerjakan tugas sekolah'],
    ['22:00', '04:00', 'Tidur']
];

$result = "";
if (isset($_GET['time'])) {
    $inputTime = $_GET['time'];
    foreach ($activities as $activity) {
        if (strtotime($inputTime) >= strtotime($activity[0]) && strtotime($inputTime) < strtotime($activity[1])) {
            $result = "Pada jam $inputTime Andi sedang melakukan: $activity[2]";
            break;
        } else {
            $result = "ngaco, dah tidur orangnya.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Aktivitas Andi</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h2>Jadwal Aktivitas Andi</h2>
    <form method="GET">
        <label for="time">Masukkan Waktu (HH:MM): </label>
        <input type="time" id="time" name="time" required>
        <button type="submit">Cek Aktivitas</button>
    </form>
    
    <p><strong><?= $result ?></strong></p>
    
    <table>
        <tr>
            <th>Waktu</th>
            <th>Aktivitas</th>
        </tr>
        <?php foreach ($activities as $activity): ?>
            <tr>
                <td><?= $activity[0] ?> - <?= $activity[1] ?></td>
                <td><?= $activity[2] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
