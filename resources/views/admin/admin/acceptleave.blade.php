@extends('admin.admin.layouts.main')
@section('content')

<?php

echo $id = $_GET["id"];

require_once "../connection.php";
$sql = "UPDATE member_leave SET status = 'Accepted' WHERE id = '$id' ";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: manage-leave.php?accept-successfuly");
}

?>

@endsection