<?php

$conn = mysqli_connect("localhost" , "root" , "" , "db_java");


function query($query) {
	global $conn;

	$result = mysqli_query ($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[]= $row;
	}

	return $rows;
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tbl_data WHERE id = $id");
	return mysqli_affected_rows($conn);
}
 

function ubah($data) {
     global $conn;
    $nama = htmlspecialchars($_POST["nama"]);
	$nim = htmlspecialchars($_POST["nim"]);
	$email = htmlspecialchars($_POST["email"]);
	$jurusan = htmlspecialchars($_POST["jurusan"]);
	$gambar = htmlspecialchars($_POST["gambar"]);
	$status = htmlspecialchars($_POST["status"]);
	$jeniskelamin = htmlspecialchars($_POST["jeniskelamin"]);




	$query = " UPDATE tbl_data SET 
				nama = '$nama',
				nim = '$nim',
				email = '$email',
				jurusan = '$jurusan',
				gambar = '$gambar'
				status = '$status'
				jeniskelamin = '$jeniskelamin'
				WHERE id = $id
				";

	//mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);


}

function registrasi($data){

	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);


	// cek usernama yang ada atau belom
	$result = mysqli_query($conn, "SELECT username FROM tbl_users WHERE username= '$username'");
	if( mysqli_fetch_assoc($result) ) {
		echo "<script> 
		      alert('username yang anda pilih sudah ada')
		      </script> ";

		return false;
	}


	if( $password !== $password2) {
		echo "<script>
		     alert('konfirmasi password tidak sesuai');
		</script>";

		return false;
	}

   //enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambah user baru ke database
	mysqli_query($conn, "INSERT INTO tbl_users VALUES('', '$username', '$password')");


    return mysqli_affected_rows($conn);
}

function edit($data) {
	global $conn;
	$id = $data["id"];
    $nama = htmlspecialchars($_POST["nama"]);
	$nim = htmlspecialchars($_POST["nim"]);
	$email = htmlspecialchars($_POST["email"]);
	$jurusan = htmlspecialchars($_POST["jurusan"]);
	$gambarLama = htmlspecialchars($_POST["gambarLama"]);
	$status = htmlspecialchars($_POST["status"]);
	$jeniskelamin = htmlspecialchars($_POST["jeniskelamin"]);



	if($_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}
	//$gambar = htmlspecialchars($_POST["gambar"]);



	$query = " UPDATE tbl_data SET 
				nama = '$nama',
				nim = '$nim',
				email = '$email',
				jurusan = '$jurusan',
				gambar = '$gambar'
				status = '$status'
				jeniskelamin = '$jeniskelamin'
				WHERE id = $id
				";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

function tambah($data) {
	global $conn;

	$nama = htmlspecialchars($_POST["nama"]);
	$nim = htmlspecialchars($_POST["nim"]);
	$email = htmlspecialchars($_POST["email"]);
	$jurusan = htmlspecialchars($_POST["jurusan"]);
	$status = htmlspecialchars($_POST["status"]);
	$jeniskelamin = htmlspecialchars($_POST["jeniskelamin"]);



	// upload gambar
	$gambar = upload();
	if(!$gambar) {
		return false;
	}




	$query = " INSERT INTO tbl_data VALUES('', '$nama', '$nim', '$email', '$jurusan', '$gambar','$status','$jeniskelamin')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function upload() {
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	if( $error === 4 ) {
		echo "<script>
		alert('pilih gambar terlebih dahulu!');
		</script>";
		return false;
	}


	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar) );
	if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
		alert('yang anda upload bukan gambar!');
		</script>";
		return false;
	}

	if ( $ukuranFile > 3000000) {
		echo "<script>
		alert('ukuran gambar terlalu besar!');
		</script>";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru.='.';
	$namaFileBaru.='.';
	$namaFileBaru.= $ekstensiGambar;


	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;



}






?>