<?php
// require_once "sync.php";
class Database
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    // GET THINK
    public function getInputLogin($npp)
    {
        $query = $this->pdo->prepare('SELECT * FROM user WHERE npp = :npp');
        $query->bindParam(':npp', $npp, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getHalaman($id)
    {
        $query = $this->pdo->prepare('SELECT id,hal FROM pages WHERE id=:id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getHalPath($hal)
    {
        $query = $this->pdo->prepare('SELECT id,path,status FROM pages WHERE hal=:hal');
        $query->bindParam(':hal', $hal, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getSessionToken($token)
    {
        $query = $this->pdo->prepare('SELECT * FROM sessions WHERE session_token = :token');
        $query->bindParam(':token', $token, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getUserByNppOrUsername($nppOrUsername)
    {
        $query = $this->pdo->prepare('SELECT * FROM user WHERE npp = :npp OR username = :username');
        $query->bindParam(':npp', $nppOrUsername, PDO::PARAM_INT);
        $query->bindParam(':username', $nppOrUsername, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getSessionTokenExpired()
    { {
            $query = $this->pdo->prepare('SELECT * FROM sessions WHERE session_token_expires < NOW() - INTERVAL 1 HOUR');
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function getPersonilOptions()
    {
        $query = $this->pdo->prepare("SELECT id, npp, nama_personil FROM personil");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getNomorLockerOptions()
    {
        $query = $this->pdo->prepare("SELECT * FROM locker");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getNamaPersonilById($id)
    {
        $query = $this->pdo->prepare('SELECT personil.nama_personil as nama, personil.npp as npp,personil.id_divisi as idDivisi,personil.lokasi as lokasi, divisi.nama_divisi as divisi FROM personil JOIN divisi ON personil.id_divisi = divisi.id WHERE personil.id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAksesPersonilById($id)
    {
        $query = $this->pdo->prepare('SELECT akses_kunci.id_akses as id,personil.*,divisi.nama_divisi FROM akses_kunci JOIN personil ON akses_kunci.id_personil = personil.id JOIN divisi ON personil.id_divisi = divisi.id WHERE akses_kunci.id_akses = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAksesPersonilByRf($rfid)
    {
        $query = $this->pdo->prepare('SELECT akses_kunci.id_locker as idLock,personil.*,divisi.nama_divisi,locker.status FROM akses_kunci JOIN personil ON akses_kunci.id_personil = personil.id JOIN divisi ON personil.id_divisi = divisi.id JOIN locker ON akses_kunci.id_locker = locker.id WHERE personil.no_rfid = :rfid');
        $query->bindParam(':rfid', $rfid, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getDivisi()
    {
        $query = $this->pdo->prepare('SELECT * FROM divisi ORDER BY kode_divisi ASC');
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getUserforEdit($id)
    {
        $query = $this->pdo->prepare("SELECT * FROM user WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getLockerforEdit($id)
    {
        $query = $this->pdo->prepare("SELECT * FROM locker WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getLocker()
    {
        $query = $this->pdo->prepare("SELECT * FROM locker");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    // END GET THINK

    // DEL THINK
    public function deleteSessionsWithToken()
    {
        $query = $this->pdo->prepare('DELETE FROM sessions WHERE session_token IS NOT NULL');
        $query->execute();
        return $query->rowCount();
    }

    public function deleteExpiredSessions()
    {
        $query = $this->pdo->prepare('DELETE FROM sessions WHERE session_token IS NOT NULL AND session_token_expires < NOW() - INTERVAL 1 HOUR');
        $query->execute();
        return $query->rowCount();
    }

    public function deletePersonilAkses($id)
    {
        $query = $this->pdo->prepare('DELETE FROM akses_kunci WHERE id_akses = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->rowCount();
    }

    public function deletePersonilData($id)
    {
        try {
            $deleteQuery = $this->pdo->prepare('DELETE FROM personil WHERE id= :id');
            $deleteQuery->bindParam(':id', $id, PDO::PARAM_STR);
            $deleteQuery->execute();
            return $deleteQuery->rowCount();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function deleteUserData($id)
    {
        try {
            $deleteQuery = $this->pdo->prepare('DELETE FROM user WHERE id= :id');
            $deleteQuery->bindParam(':id', $id, PDO::PARAM_STR);
            $deleteQuery->execute();
            return $deleteQuery->rowCount();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function deleteLockerData($id)
    {
        try {
            $deleteQuery = $this->pdo->prepare('DELETE FROM locker WHERE id= :id');
            $deleteQuery->bindParam(':id', $id, PDO::PARAM_STR);
            $deleteQuery->execute();
            return $deleteQuery->rowCount();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    // END DEL THINK

    // INSERT THINK
    public function insertSessionLogin($npp, $token, $expiry)
    {
        $query = $this->pdo->prepare('INSERT INTO sessions (npp,session_token,session_token_expires) VALUES (:npp,:token,:expiry)');
        $query->bindParam(':npp', $npp, PDO::PARAM_INT);
        $query->bindParam(':token', $token, PDO::PARAM_STR);
        $query->bindParam(':expiry', $expiry, PDO::PARAM_STR);

        try {
            $query->execute();
            return true; // Penyisipan berhasil
        } catch (PDOException $e) {
            // Penanganan kesalahan
            return false; // Penyisipan gagal
        }
    }

    public function insertAksesPersonil($idPersonil, $idLocker, $tglDaftar, $norfid)
    {
        $query = $this->pdo->prepare('INSERT INTO akses_kunci (id_locker, id_personil, tgl_daftar) VALUES (:locker, :personil, :tgldaftar)');
        $query->bindParam(':locker', $idLocker, PDO::PARAM_INT);
        $query->bindParam(':personil', $idPersonil, PDO::PARAM_INT);
        $query->bindParam(':tgldaftar', $tglDaftar, PDO::PARAM_STR);

        try {
            $query->execute();

            $query = $this->pdo->prepare('UPDATE personil SET no_rfid = :rfid WHERE id = :id');
            $query->bindValue(':id', $idPersonil, PDO::PARAM_INT);
            $query->bindValue(':rfid', $norfid, PDO::PARAM_STR);
            $query->execute();

            // Jika Anda ingin mendapatkan jumlah baris yang berhasil di-update, Anda bisa menggunakan 'rowCount()'.
            // Misalnya: $rowCount = $query->rowCount();

            return true; // Penyisipan dan update berhasil
        } catch (PDOException $e) {
            // Penanganan kesalahan
            return false; // Penyisipan atau update gagal
        }
    }


    public function insertHistoryLogin($token, $expiry, $npp, $nama, $role, $browserName, $browserVersion, $deviceType)
    {
        $query = $this->pdo->prepare('INSERT INTO history_login (npp,nama,role,session_token,session_token_expires,tgl_login,browser,versi_browser,device) VALUES (:npp,:nama,:role,:token,:expiry,:tgl_login,:browser,:versi_browser,:device)');
        $query->bindParam(':token', $token, PDO::PARAM_STR);
        $query->bindParam(':expiry', $expiry, PDO::PARAM_STR);
        $query->bindParam(':npp', $npp, PDO::PARAM_INT);
        $query->bindParam(':nama', $nama, PDO::PARAM_STR);
        $query->bindParam(':role', $role, PDO::PARAM_STR);
        $query->bindParam(':tgl_login', $expiry, PDO::PARAM_STR);
        $query->bindParam(':browser', $browserName, PDO::PARAM_STR);
        $query->bindParam(':versi_browser', $browserVersion, PDO::PARAM_STR);
        $query->bindParam(':device', $deviceType, PDO::PARAM_STR);
        try {
            $query->execute();
            return true; // Penyisipan berhasil
        } catch (PDOException $e) {
            // Penanganan kesalahan
            return false; // Penyisipan gagal
        }
    }

    public function insertDataPersonil($nama, $npp, $divisi, $rfid, $lokasi)
    {
        $query = $this->pdo->prepare('INSERT INTO personil (nama_personil, npp,id_divisi,no_rfid,lokasi) VALUES(:nama, :npp, :divisi,:rfid,:lokasi)');
        $query->bindParam(':nama', $nama, PDO::PARAM_STR);
        $query->bindParam(':npp', $npp, PDO::PARAM_STR);
        $query->bindParam(':divisi', $divisi, PDO::PARAM_INT);
        $query->bindParam(':rfid', $rfid, PDO::PARAM_STR);
        $query->bindParam(':lokasi', $lokasi, PDO::PARAM_STR);
        try {
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function insertUser($npp, $nama, $user, $role, $password, $profil, $lokasi)
    {
        try {
            $query = $this->pdo->prepare("INSERT INTO user (npp, nama, username, role, password, profile, lokasi) VALUES (:npp, :nama, :user, :role, :password, :profil, :lokasi)");
            $query->bindParam(':npp', $npp, PDO::PARAM_INT);
            $query->bindParam(':nama', $nama, PDO::PARAM_STR);
            $query->bindParam(':user', $user, PDO::PARAM_STR);
            $query->bindParam(':role', $role, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);
            $query->bindParam(':profil', $profil, PDO::PARAM_STR);
            $query->bindParam(':lokasi', $lokasi, PDO::PARAM_STR);
            $query->execute();

            return true; // Penyisipan berhasil

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function inserLocker($nomor, $kode, $nogedung, $namagedung)
    {
        try {
            $query = $this->pdo->prepare("INSERT INTO locker (nomor, kode_locker, NoGedung, ket) VALUES (:nomor, :kode, :nogedung, :namagedung)");
            $query->bindParam(':nomor', $nomor, PDO::PARAM_STR);
            $query->bindParam(':kode', $kode, PDO::PARAM_STR);
            $query->bindParam(':nogedung', $nogedung, PDO::PARAM_STR);
            $query->bindParam(':namagedung', $namagedung, PDO::PARAM_STR);
            $query->execute();

            return true; // Penyisipan berhasil

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    // END INSERT THINK

    // UPDATE THINK
    public function updatePageStatus($id, $status)
    {
        $query = $this->pdo->prepare('UPDATE pages SET status = CASE WHEN id = :id THEN "active" ELSE "inactive" END');
        $query->bindValue(':id', $id);
        $query->execute();
        return $query->rowCount();
    }

    public function updateAksesPersonil($idAkses, $idLocker, $norfid)
    {
        $query = $this->pdo->prepare('UPDATE akses_kunci JOIN personil ON akses_kunci.id_personil = personil.id SET akses_kunci.id_locker = :locker, personil.no_rfid = :rfid WHERE akses_kunci.id_akses = :id');
        $query->bindValue(':id', $idAkses, PDO::PARAM_INT);
        $query->bindValue(':locker', $idLocker, PDO::PARAM_INT);
        $query->bindValue(':rfid', $norfid, PDO::PARAM_STR);

        try {
            $query->execute();
            return $query->rowCount();
        } catch (PDOException $e) {
            // Penanganan kesalahan
            return -1;
        }
    }

    public function updateDataPersonil($idPersonil, $nama, $npp, $divisi, $lokasi)
    {
        $query = $this->pdo->prepare('UPDATE personil SET nama_personil = :nama,npp = :npp,id_divisi = :divisi,lokasi = :lokasi WHERE id = :id');
        $query->bindValue(':id', $idPersonil, PDO::PARAM_INT);
        $query->bindValue(':nama', $nama, PDO::PARAM_STR);
        $query->bindValue(':npp', $npp, PDO::PARAM_STR);
        $query->bindValue(':divisi', $divisi, PDO::PARAM_INT);
        $query->bindValue(':lokasi', $lokasi, PDO::PARAM_STR);
        try {
            $query->execute();
            return $query->rowCount();
        } catch (PDOException $e) {
            // Penanganan kesalahan
            return -1;
        }
    }

    public function updateDataLocker($id, $nomor, $kode, $nogedung, $namagedung)
    {
        $query = $this->pdo->prepare('UPDATE locker SET nomor = :nomor,kode_locker = :kode,NoGedung = :nogd,ket = :namagedung WHERE id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':nomor', $nomor, PDO::PARAM_STR);
        $query->bindValue(':kode', $kode, PDO::PARAM_STR);
        $query->bindValue(':nogd', $nogedung, PDO::PARAM_STR);
        $query->bindValue(':namagedung', $namagedung, PDO::PARAM_STR);
        try {
            $query->execute();
            return $query->rowCount();
        } catch (PDOException $e) {
            // Penanganan kesalahan
            return -1;
        }
    }

    public function updateUserData($id, $nama, $npp, $user, $role, $password, $profil, $lokasi)
    {
        $query = $this->pdo->prepare('UPDATE user SET npp = :npp, nama = :nama, username = :user, role = :role, password = :password, profile = :profil, lokasi = :lokasi WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->bindValue(':nama', $nama);
        $query->bindValue(':npp', $npp);
        $query->bindValue(':user', $user);
        $query->bindValue(':role', $role);
        $query->bindValue(':password', $password);
        $query->bindValue(':profil', $profil);
        $query->bindValue(':lokasi', $lokasi);
        $query->execute();
        return $query->rowCount();
    }

    public function updateStatusLocker($id,$setStatus)
    {
        $query = $this->pdo->prepare('UPDATE locker SET status = :status WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->bindValue(':status', $setStatus);
        $query->execute();
        return $query->rowCount();
    }
}
