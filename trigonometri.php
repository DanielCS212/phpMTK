
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Matematika</title>
    <style>
        body { 
            font-family: Arial, sans-serif; text-align: center; 
        }
        .container { 
            width: 50%; 
            margin: auto; 
            padding: 20px; 
            border: 1px solid #ddd; 
            border-radius: 10px; 
            box-shadow: 2px 2px 10px #aaa; 
        }
        input, select, button { 
            margin: 10px; 
            padding: 8px; 
            width: 80%; 
        }
        button { background-color: #28a745; 
            color: white; 
            border: none; 
            cursor: pointer; 
        }
        button:hover { 
            background-color: #218838; 
        }
        .hasil { 
            font-size: 18px; 
            font-weight: bold; 
            margin-top: 20px; 
        }
        .pertanyaan { 
            font-size: 16px; 
            margin-top: 10px; 
        }
        .jawaban { 
            font-size: 16px; 
            margin-top: 10px; 
        }
        .validasi { 
            font-size: 16px; 
            margin-top: 10px; 
            color: green; 
        }
        .salah { 
            color: red; 
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Tugas Kalkulator Matematika</h2>
        <h2>Kelompok ...</h2>
        <p>1. Fatih Ahmad Zakky (14)</P>
        <p>2. Narendra Zahir Atha Zahran (23)</P>
        <p>3. Nizar Azzuhra (25)</p>
        <p>4. Raihan Aditya Pratama (26)</P>
        <p>5. Samuel Gavah Pratama (32)</p>
        <p>6. Zhafar Desfiyanto (36)</p>
        <br>
        <form method="POST">
            <label>Pilih Perhitungan:</label>
            <select name="operasi">
                <option value="lingkaran">Luas & Keliling Lingkaran</option>
                <option value="segitiga">Luas & Keliling Segitiga</option>
                <option value="persegi_panjang">Luas & Keliling Persegi Panjang</option>
                <option value="trigonometri">Hitung Sin, Cos, Tan</option>
                <option value="pythagoras">Aturan Pythagoras</option>
            </select>

            <div id="inputFields">
                <input type="number" name="input1" placeholder="Masukkan nilai pertama" required>
                <input type="number" name="input2" placeholder="Masukkan nilai kedua (jika perlu)">
                <input type="number" name="input3" placeholder="Masukkan nilai ketiga (jika perlu)">
            </div>

            <div class="pertanyaan">
                <label>Pertanyaan:</label>
                <input type="text" name="pertanyaan" placeholder="Masukkan pertanyaan terkait operasi" required>
            </div>

            <div class="jawaban">
                <label>Jawaban Anda:</label>
                <input type="text" name="jawaban" placeholder="Masukkan jawaban Anda" required>
            </div>

            <button type="submit" name="hitung">Hitung</button>
        </form>

        <?php
        if (isset($_POST['hitung'])) {
            $operasi = $_POST['operasi'];
            $input1 = isset($_POST['input1']) ? $_POST['input1'] : 0;
            $input2 = isset($_POST['input2']) ? $_POST['input2'] : 0;
            $input3 = isset($_POST['input3']) ? $_POST['input3'] : 0;
            $pertanyaan = $_POST['pertanyaan'];
            $jawaban = $_POST['jawaban'];

            
            $jawaban_benar = "";
            $validasi = "";

            if ($operasi == "lingkaran") {
                $jawaban_benar = "Luas lingkaran dihitung dengan π × r² dan keliling dengan 2 × π × r.";
                $luas = pi() * pow($input1, 2);
                $keliling = 2 * pi() * $input1;
                $hasil = "<div class='hasil'>Luas = π × r² = " . round($luas, 2) . "<br>Keliling = 2 × π × r = " . round($keliling, 2) . "</div>";
            }
            elseif ($operasi == "segitiga") {
                $jawaban_benar = "Luas segitiga dihitung dengan ½ × alas × tinggi dan keliling dengan a + b + c.";
                $luas = 0.5 * $input1 * $input2;
                $keliling = $input1 + $input2 + $input3;
                $hasil = "<div class='hasil'>Luas = ½ × alas × tinggi = " . round($luas, 2) . "<br>Keliling = a + b + c = " . round($keliling, 2) . "</div>";
            }
            elseif ($operasi == "persegi_panjang") {
                $jawaban_benar = "Luas persegi panjang dihitung dengan panjang × lebar dan keliling dengan 2 × (panjang + lebar).";
                $luas = $input1 * $input2;
                $keliling = 2 * ($input1 + $input2);
                $hasil = "<div class='hasil'>Luas = panjang × lebar = " . round($luas, 2) . "<br>Keliling = 2 × (panjang + lebar) = " . round($keliling, 2) . "</div>";
            }
            elseif ($operasi == "trigonometri") {
                $jawaban_benar = "sin, cos, dan tan dihitung berdasarkan sudut yang diberikan.";
                $sudut = $input1;
                $sin = sin(deg2rad($sudut));
                $cos = cos(deg2rad($sudut));
                $tan = tan(deg2rad($sudut));
                $hasil = "<div class='hasil'>sin($sudut°) = " . round($sin, 4) . "<br>cos($sudut°) = " . round($cos, 4) . "<br>tan($sudut°) = " . round($tan, 4) . "</div>";
            }
            elseif ($operasi == "pythagoras") {
                $jawaban_benar = "Sisi miring dihitung dengan √(a² + b²).";
                if ($input1 != 0 && $input2 != 0) {
                    $c = sqrt(pow($input1, 2) + pow($input2, 2));
                    $hasil = "<div class='hasil'>Sisi miring = √(" . $input1 . "² + " . $input2 . "²) = " . round($c, 2) . "</div>";
                } else {
                    $hasil = "<div class='hasil'>Masukkan dua sisi untuk menghitung sisi miring.</div>";
                }
            }

            // Validasi Jawaban
            if (strpos(strtolower($jawaban), strtolower($jawaban_benar)) !== false) {
                $validasi = "<div class='validasi'>Jawaban Anda Benar!</div>";
            } else {
                $validasi = "<div class='validasi salah'>Jawaban Anda Salah. Jawaban yang benar adalah: $jawaban_benar</div>";
            }

            // Tampilkan Hasil
            echo "<div class='pertanyaan'>Pertanyaan: $pertanyaan</div>";
            echo "<div class='jawaban'>Jawaban Anda: $jawaban</div>";
            echo $validasi;
            echo $hasil;
        }
        ?>

    </div>

</body>
</html>
