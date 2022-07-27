<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RajaOngkir extends CI_Controller
{
    private $api_key = '3024096a70af07ef08ef7196a26a54c7';

    public function provinsi()
    {
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province?",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: $this->api_key"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            $array_response = json_decode($response, true);

            $data_user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            echo "<option value=''>" . $data_user['provinsi'] . "</option>";

            $data_provinsi = $array_response['rajaongkir']['results'];
            foreach ($data_provinsi as $key => $value){
                echo "<option value='".$value['province_id']. "' id_provinsi='" . $value['province_id'] . "'>" . $value['province'] . "</option>";
            }
        }
            
    }

    public function kota()
    {
        $id_provinsi_terpilih = $this->input->post('id_provinsi');
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=". $id_provinsi_terpilih,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array_response = json_decode($response, true);

            $data_user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            echo "<option value=''>" . $data_user['kota'] . "</option>";

            $data_kota = $array_response['rajaongkir']['results'];
            foreach ($data_kota as $key => $value) {
                echo "<option value='" . $value['city_id'] . "' id_kota='" . $value['city_id'] . "'>" . $value['city_name'] . "</option>";
            }
        }
    }

    public function kode_pos()
    {
        $id_kota_terpilih = $this->input->post('id_kota');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?city_name=".  $id_kota_terpilih,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array_response = json_decode($response, true);

            // $data_user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            // echo "<option value=''>" . $data_user['kode_pos'] . "</option>";

            $data_kode_pos = $array_response['rajaongkir']['results'];
            foreach ($data_kode_pos as $key => $value) {
                echo "<option value='" . $value['city_id'] . "'>" . $value['postal_code'] . "</option>";
            }
        }
    }

    public function ongkir()
    {
        $kota_terpilih = $this->input->post('kota');
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=78&destination=" . $kota_terpilih. "&weight=1000&courier=jne",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}