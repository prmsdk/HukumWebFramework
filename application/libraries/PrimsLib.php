<?php

class PrimsLib {

    public function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {

    // mengambil nilai kode ex: USR0015 hasil USR
    $kode = substr($id_terakhir, 0, $panjang_kode);
    
    // mengambil nilai angka
    // ex: USR0015 hasilnya 0015
    $angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
    
    // menambahkan nilai angka dengan 1
    // kemudian memberikan string 0 agar panjang string angka menjadi 4
    // ex: angka baru = 6 maka ditambahkan strig 0 tiga kali
    // sehingga menjadi 0006
    $angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
    
    // menggabungkan kode dengan nilang angka baru
    $id_baru = $kode.$angka_baru;
    
    return $id_baru;
    }

    function month($month, $format = "mmmm"){  
        if($format == "mmmm"){    
            $fm = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");  
        }elseif($format == "mmm"){    
            $fm = array("Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des");  
        }    
        return $fm[$month-1];
    }
        
    function day($day, $format = "dddd"){  
        if($format == "dddd"){    
            $fd = array("Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu","Minggu");  
        }elseif($format == "ddd"){    
            $fd = array("Sen","Sel","Rab","Kam","Jum","Sab","Min");  
        }    
        return $fd[$day-1];
    }

    function upload_file($file, $name, $format, $size){
        $ci =& get_instance();
        if ($name != '') {
            $config['upload_path'] = './assets/files/' . $file;
            $config['allowed_types'] = $format;
            $config['max_size'] = $size;
            // $config['max_width']  = '2048';
            // $config['max_height']  = '2048';
            $config['encrypt_name'] = TRUE;
            
            $ci->load->library('upload', $config);
            
            if (!$ci->upload->do_upload($file))
            {
                $error = array('error' => $ci->upload->display_errors(),
                                'hak_cipta' => $ci->model_hakcipta->getAll('hak_cipta')->result(),
                                'jenis_karya' => $ci->model_hakcipta->getAll('jenis_karya')->result(),
                                'user' => $ci->model_hakcipta->getAll('user')->result(),
                                'country' => $ci->load->view('admin/templates/country', NULL, TRUE),
                                'custom' => $ci->lang->line('Pengunggahan file' . $file . 'Gagal!')
                );
                echo $ci->load->view('admin/templates/header', array(), TRUE);
                echo $ci->load->view('admin/templates/sidebar', array(), TRUE);
                echo $ci->load->view('admin/hak_cipta/index', $error, TRUE);
                echo $ci->load->view('admin/templates/footer', array(), TRUE);
                exit;
            }
            else
            {
                return $file = $ci->upload->data('file_name');
            }
        }
    
    }
}