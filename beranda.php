<?php
	if(!defined("INDEX")) die("---");
?>

<style>
  .card-container {
    display: flex;
    gap: 20px;
    margin-top: 30px;
    flex-wrap: wrap;
  }

  .card {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    overflow: hidden;
    transition: transform 0.2s;
  }

  .card:hover {
    transform: scale(1.02);
  }

  .card-img {
    width: 600px;
  }

  .card-img img {
    width: 100%;
    height: 200px;
    object-fit: cover;
  }

  .card-info {
    width: 300px;
  }

  .card-content {
    padding: 20px;
    text-align: center;
  }

  .card-content img.logo {
    width: 80px;
    margin-bottom: 10px;
  }

  .btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #3b82f6;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
    font-weight: bold;
  }

  .btn:hover {
    background-color: #2563eb;
  }
</style>

<h2 class="sub-header">Selamat Datang di Halaman Administrator</h2>
<h4>Pilih salah satu menu di atas untuk mengatur website!</h4>

<!-- Card Area -->
<div class="card-container">
  <!-- Card Gambar Kantor -->
  <div class="card card-img">
    <img src="gambar/foto.jpg" alt="Gambar Halaman Admin">
  </div>

  <!-- Card Info dan Tombol -->
  <div class="card card-info">
    <div class="card-content">
      <img src="gambar/logo.png" alt="Logo" class="logo" />
      <h3>Buana Jaya Printing</h3>
      <p>Kunjungi Website Buana Jaya Printing</p>
      <a href="http://localhost/web/" target="_blank" class="btn">Kunjungi Website</a>
    </div>
  </div>
</div>
