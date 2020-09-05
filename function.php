<?php
    $conn = mysqli_connect("localhost", "root", "", "project_1");

    function query($query) {
        global $conn;

        $result = mysqli_query($conn, $query);
        $rows = [];

        while($row = mysqli_fetch_assoc($result)) : 
            $rows[] = $row;
        endwhile;

        return $rows;
    }

    function tambah($data) {
        global $conn;

        $tipe = htmlspecialchars($data["tipe"]);
        $barang = htmlspecialchars($data["barang"]);
        $jumlah = htmlspecialchars($data["jumlah"]);
        $sumber = htmlspecialchars($data["sumber"]);
        $tujuan = htmlspecialchars($data["tujuan"]);
        $waktu = $data["waktu"];

        // ini harus urut atau sama urutanya dengan di database 
        $query = "INSERT INTO laporan VALUES
                  ('', '$tipe', '$barang', '$jumlah', '$sumber', '$tujuan', '$waktu')";
        mysqli_query($conn, $query);

        $notif = mysqli_affected_rows($conn);
        if($notif > 0) :
            echo "
                <script>
                    alert('Successfully Insert New Data');
                    document.location.href = '../Main/html/index.php';
                </script>
            ";
        else:
            echo "
                <script>
                    alert('Failed Insert New Data');
                </script>
            ";
        endif;
    }

    function ubah($data) {
        global $conn;

        $id = $data["id"];
        $tipe = htmlspecialchars($data["tipe"]);
        $barang = htmlspecialchars($data["barang"]);
        $jumlah = htmlspecialchars($data["jumlah"]);
        $sumber = htmlspecialchars($data["sumber"]);
        $tujuan = htmlspecialchars($data["tujuan"]);
        $waktu = $data["waktu"];

        $query = "UPDATE laporan SET
                tipe = '$tipe',
                barang = '$barang',
                jumlah = '$jumlah',
                sumber = '$sumber',
                tujuan = '$tujuan',
                waktu = '$waktu' WHERE id = $id";
        mysqli_query($conn, $query);

        $notif = mysqli_affected_rows($conn);
        if($notif > 0) :
            echo "
                <script>
                    alert('Successfully Update Data');
                    document.location.href = 'index.php';
                </script>
            ";
        else:
            echo "
                <script>
                    alert('Failed Update Data');
                </script>
            ";
        endif;
    }

    function hapus($id) {
        global $conn;

        $query = "DELETE FROM laporan WHERE id = $id";
        mysqli_query($conn, $query);

                $notif = mysqli_affected_rows($conn);
        if($notif > 0) :
            echo "
                <script>
                    document.location.href = 'Main/html/index.php';
                </script>
            ";
        endif;
    }

    function cari($keyword) {
        global $conn;

        $query = "SELECT * FROM laporan WHERE 
                tipe LIKE '%$keyword%' OR
                barang LIKE '%$keyword%' OR
                sumber LIKE '%$keyword%' OR
                tujuan LIKE '%$keyword%' OR
                waktu LIKE '%$keyword%'";
        return query($query);
    }

    function registrasi($data) {
        global $conn;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);
        $gambar = "default.jpeg";
        $fullname = "";
        $email = strtolower($data["email"]);
        $nomer = "";
        $pesan = "";
        
        // cek user sudah ada apa belum
        $result1 = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        $result2 = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
        // var_dump($result);

        if(mysqli_num_rows($result1) === 1 ) :
            echo "
                <script>
                    alert('Username is Already Exist');
                    exit;
                </script>
            ";
            return false;
        endif;

        if(mysqli_num_rows($result2) === 1 ) :
            echo "
                <script>
                    alert('Email is Already Exist');
                    exit;
                </script>
            ";
            return false;
        endif;

        // cek password (harus sama)
        if($password !== $password2) :
            echo "
                <script>
                    alert('Password is not Match!');
                </script>
            ";
            return false;
        endif;

        // encode password
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user VALUES
                  ('', '$username', '$password', '$gambar', '$fullname', '$email', '$nomer', '$pesan')";
        mysqli_query($conn, $query);

        $notif = mysqli_affected_rows($conn);
        if($notif > 0) :
            echo "
                <script>
                    alert('Account Created Successfully');
                    document.location.href = 'login.php';
                </script>
            ";
        else:
            echo "
                <script>
                    alert('Account Created Failed');
                </script>
            ";
        endif;
    }

    function login($data) {
        global $conn;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);

        $result1 = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        $result2 = mysqli_query($conn, "SELECT * FROM user WHERE email = '$username'");
        // var_dump($result);

        if(mysqli_num_rows($result1) === 1) :
            $row = mysqli_fetch_assoc($result1);
            if(password_verify($password, $row["password"])) :

                $_SESSION["login"] = $username;

                header("Location: ../Main/html/index.php");
                exit;
            else:
                $error = true;
            endif;
        elseif(mysqli_num_rows($result2) === 1) :
            $row = mysqli_fetch_assoc($result2);
            if(password_verify($password, $row["password"])) :

                $_SESSION["login"] = $username;

                header("Location: ../Main/html/index.php");
                exit;
            else:
                $error = true;
            endif;
        endif;
        $error = true;
        return $error;
    }

    function profile($data) {
        global $conn;

        $id = $data["id"];
        $username = strtolower(stripslashes($data["username"]));
        $password = $data["password"];
        $gambar = "default.jpeg";
        $fullname = htmlspecialchars($data["fullname"]);
        $email = strtolower($data["email"]);
        $nomer = htmlspecialchars($data["nomer"]);
        $pesan = htmlspecialchars($data["pesan"]);

        $query = "UPDATE user SET
                username = '$username',
                password = '$password',
                gambar = '$gambar',
                fullname = '$fullname',
                email = '$email',
                nomer = '$nomer',
                pesan = '$pesan' WHERE id = '$id'";
        mysqli_query($conn, $query);

        $notif = mysqli_affected_rows($conn);
        if($notif > 0) :
            echo "
                <script>
                    alert('Successfully Update Data');
                    document.location.href = 'profile.php';
                </script>
            ";
        elseif($notif == 0):
            echo "
                <script>
                    alert('Noting Changes on Profile Data');
                </script>
            ";
        else:
            echo "
                <script>
                    alert('Failed Update Data');
                </script>
            ";
        endif;
    }
?>