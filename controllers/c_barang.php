<?php

include_once 'c_koneksi.php';


class c_barang
{


    function tampil()
    {

        $conn = new c_koneksi();

        //30, mengambil data dari tabel barang, dan mengurutkan berdasarkan kolom id
        $sql = "SELECT * FROM barang ORDER BY id DESC";

        $query = mysqli_query($conn->conn(), $sql);

        //7, mengubah query data menjadi objeck,  
        while ($q = mysqli_fetch_object($query)) {

            //27, membuat array kosong, untuk menampung data object
            $hasil[] = $q;
        }

        //9 mengembalikan nilai
        // return $hasil;
        
        if (!empty($hasil)) {
            return $hasil;

        }
    }

    function tambah($id, $nama, $qty, $harga, $photo)
    {

        $conn = new c_koneksi();

        
        //19, untuk menambakan data ke tabel barang
        $sql = "INSERT INTO barang VALUES ('$id','$nama', '$qty', '$harga', '$photo')";

        //22, menjalankan perintah $sql 
        $query = mysqli_query($conn->conn(), $sql);

        if ($query) {

            // echo "data tidak gagal ditambahkan";
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/barang.php'</script>";

        } else {

            echo "data gagal ditambahkan";
        }
    }

    function edit($id){

        $conn = new c_koneksi();
        
        //11, menampilkan data dari table barang, berdasarkan id
        $sql = "SELECT * FROM barang WHERE id=$id ";

        $query = mysqli_query($conn->conn(),$sql);

        
        while ($q = mysqli_fetch_object($query)) {
                
        $hasil[] = $q;

        }

        return $hasil;
    }

    function update($id, $nama, $qty, $harga, $photo){

        $conn = new c_koneksi();

        //3, mengedit barang yang ada didatabase,  berdasarkan id
        $sql = "UPDATE barang SET  nama_barang='$nama', qty='$qty',  harga='$harga', photo='$photo' WHERE id='$id'";
        // echo var_dump($sql);

        $query = mysqli_query($conn->conn(), $sql);
        

        if ($query) {

            // echo "<script>alert('Data Berhasil Di Ubah');window.location='../views/barang.php'</script>";

            echo "data tidak gagal diubah";


         }

         else{

            echo "data gagal diubah";
         }


    }

    function delete($id)
    {
        $conn = new c_koneksi();

        //14, unutk memerintahkan menghapus sebuah barang berdasarkan id barang
        $query = "DELETE FROM barang WHERE id = $id";

        mysqli_query($conn->conn(), $query);

        header("location:../views/barang.php");
    }
}
