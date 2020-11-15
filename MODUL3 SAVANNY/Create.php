<?php 
    include('config.php');

    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];
        $tanggal = $_POST['tanggal'];
        $jammulai = $_POST['mulai'];
        $jamberakhir = $_POST['berakhir'];
        $tempat = $_POST['tempat'];
        $harga = $_POST['harga'];
        $benefit = implode(",", $_POST['benefit']);
        $kategori = $_POST['kategori'];

        
    

        $rand = rand();
        $ekstensi =  array('png','jpg','jpeg','gif');
        $filename = $_FILES['gambar']['name'];
        $ukuran = $_FILES['gambar']['size'];
        $temp = $_FILES['gambar']['tmp_name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
  
    if(!in_array($ext,$ekstensi) ) {
        header("location:Home.php?alert=gagal_ekstensi");
    }else{
        		
            $xx = $rand.'_'.$filename;
            $xx = basename($xx);
            $path = "gambar/$xx";
            move_uploaded_file($temp,$path);
            mysqli_query($conn, "INSERT INTO event VALUES (NULL,'$nama','$deskripsi','$xx','$kategori','$tanggal','$jammulai','$jamberakhir','$tempat','$harga','$benefit')");
            header("location:Home.php?alert=berhasil");
        
            
        // }else{
        //     header("location:home.php?alert=gagal_ukuran");
        // }
    }
    } 

       
    

?>