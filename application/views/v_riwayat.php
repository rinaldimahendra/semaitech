<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('template_user/header');
?>
<section class="bg0 p-t-95 p-b-60">
    <div class="container">
        <h1 class="h3 mb-20 text-gray-800">Riwayat Pesanan</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#VerifikasiPembayaran" role="tab" aria-controls="#VerifikasiPembayaran" aria-selected="true">Verifikasi Pembayaran (  )</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Dikemas" role="tab" aria-controls="#Dikemas" aria-selected="false">Dikemas (  )</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Dikirim" role="tab" aria-controls="#Dikirim" aria-selected="false">Dikirim ( )</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Selesai" role="tab" aria-controls="#Selesai" aria-selected="false">Selesai ( )</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="VerifikasiPembayaran" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table">
                                    <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th class="text-center">Tgl Pemesanan</th>
                                                <th class="text-center">Tagihan</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
    
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">
                                                    <span class='badge badge-primary text-light'>Menunggu Verifikasi</span>
                                                </td>
                                                <td>
                                                
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="Dikemas" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table3">
                                    <table class="table table-bordered" id="table3" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th class="text-center">Tgl Pemesanan</th>
                                                <th class="text-center">Tagihan</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                                <tr>
                                                    <td></td>
                                                    <td>

                                                    </td>
                                                    <td></td>
                                                    <td class="text-center">
                                                        <span class='badge badge-danger text-light'>Dikemas</span>
                                                    </td>
                                                    <td>
                                                        
                                                    </td>
                                                </tr>
                                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="Dikirim" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table4">
                                    <table class="table table-bordered" id="table4" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th class="text-center">Tgl Pemesanan</th>
                                                <th class="text-center">Tagihan</th>
                                                <th class="text-center">Tanggal Kirim</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-center">
                                                        <span class='badge badge-info text-light'>Dikirim</span>
                                                    </td>
                                                    <td>
                                                    
                                                    </td>
                                                </tr>
                                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="Selesai" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table5">
                                    <table class="table table-bordered" id="table5" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th class="text-center">Tgl Pemesanan</th>
                                                <th class="text-center">Tagihan</th>
                                                <th class="text-center">Tanggal Kirim</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-center">
                                                        <span class='badge badge-success text-light'>Selesai</span>
                                                    </td>
                                                    <td>
                                                    
                                                    </td>
                                                </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</section>

<?php $this->load->view('template_user/footer'); ?>