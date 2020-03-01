<?php

class Testing4 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        //$this->load->library('form_validation');
        $this->load->library('unit_test');
        // $this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        //template
        $str = '
            <table border="0" cellpadding="4" cellspacing="1">
            {rows}
                    <tr>
                            <td>{item}</td>
                            <td>{result}</td>
                    </tr>
            {/rows}
            </table>';
        //$this->unit->set_template($str);    
        $true = true;
        $expected = true;
        $test_name = 'uji coba assert';

        $judul = 'Pengujian assert namachief null namarm null';
        $expected ="Something wrong. Please contact US";
        $this->unit->run($this->ifelse(null,null),$expected,$judul);

        $judul = 'Pengujian assert  namachief Monic namarm null';
        $result = $this->ifelse("Monic",null);
        $expected ='Monic';
        $this->unit->run($result,"Monic",$judul);

        $judul = 'Pengujian assert namachief Monica namarm Carista';
        $result = $this->ifelse("Monica","Carista");
        $expected ='Monica';
        $this->unit->run($result,"Monica",$judul);

        $judul = 'Pengujian assert namachief null namarm monica';
        $result = $this->ifelse(null,"Monica");
        $expected = 'Monic';
        $this->unit->run($result,"Monica",$judul);;

        //pengujian ifelse2
        $judul = 'Pengujian ifelse2 namachief null namarm null';
        $expected ="Something wrong. Please contact US";
        $this->unit->run($this->ifelse(null,null),$expected,$judul);

        $judul = 'Pengujian ifelse2  teman andi';
        $result = $this->ifelse2("andi");
        $expected ='dia bukan teman saya';
        $this->unit->run($result,"dia bukan teman saya",$judul);

        $judul = 'Pengujian ifelse2  teman null';
        $result = $this->ifelse2("");
        $expected ='dia bukan teman saya';
        $this->unit->run($result,"dia bukan teman saya",$judul);

        $judul = 'Pengujian ifelse2  teman null1';
        $result = $this->ifelse2("");
        $expected ='dia adalah teman saya';
        $this->unit->run($result,"dia adalah teman saya",$judul);

        //pengujian if else3
        $judul = 'Pengujian ifelse3 namachief null namarm null namamhs null';
        $expected ="Something wrong. Please contact US";
        $this->unit->run($this->ifelse(null,null,null),$expected,$judul);

        $judul = 'Pengujian ifelse3  namachief monica namaarm null namamhs monica';
        $result = $this->ifelse3(null,null,"monica");
        $expected ='monica';
        $this->unit->run($result,"monica",$judul);

        $judul = 'Pengujian ifelse3  namachief monica namaarm monica namamhs null';
        $result = $this->ifelse3("monica","monica",null);
        $expected ='monica';
        $this->unit->run($result,"monica",$judul);

        $judul = 'Pengujian ifelse3  namachief null namaarm monica namamhs null';
        $result = $this->ifelse3(null,"monica",null);
        $expected ='null';
        $this->unit->run($result,"monica",$judul);

        $judul = 'Pengujian ifelse3  namachief monica namaarm null namamhs null';
        $result = $this->ifelse3("monica",null,null);
        $expected ='monica';
        $this->unit->run($result,"monica",$judul);
        
        //pengujian if else 4
        $judul = 'Pengujian ifelse4 d';
        $result = $this->ifelse4();
        $expected ='Have a nice Tuesday!';
        $this->unit->run($result,$expected,$judul);
        //pengujian loop 1
        $test_name ='tes loop 1';
        $this->unit->run($this->loop1(1),2048,$test_name);

        $test_name ='tes loop 1_2';
        $this->unit->run($this->loop1(null),null,$test_name);
        //pengujian loop 2
        $test_name = 'tes loop 2_1';
        $arr = array(0,1,2,3,4);
        $this->unit->run($this->loop2($arr),4,$test_name);

        $test_name = 'tes loop 2_2';
        $arr =array(null);
        $this->unit->run($this->loop2($arr),0,$test_name);

        $test_name = 'tes loop 2_3';
        $arr = array(1,1,1,1,1);
        $this->unit->run($this->loop2($arr),3,$test_name);

        $test_name = 'tes loop 2_4';
        $arr = array();
        $this->unit->run($this->loop2($arr),0,$test_name);

        // $test_name = 'tes loop 2_5';
        // $this->unit->run($this->loop2(),0,$test_name);
        //pengujian loop 3
        $test_name = 'tes loop 3';
        $this->unit->run($this->loop3(1),2048,$test_name);

        $test_name = 'tes loop 3_1';
        $this->unit->run($this->loop3(null),0,$test_name);
        echo $this->unit->report();
    }

        echo $this->unit->report();
        //test url
        //$output = $this->request('GET',['Login','test']);
        $expect = '{"foo":"bar"}';

        //$this->unit->run($output,$expect,$test_name);
        $this->unit->run($true,$expected,$test_name);

        $test_name = 'tes if else';
        $this->unit->run($this->ifelse('tes','halo'),'tes',$test_name);

        $test_name = 'tes loop 2';
        $arr = array(0,1,2,3,4);
        $this->unit->run($this->loop2($arr),4,$test_name);

        echo $this->unit->report();
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('admin/login'));
    }

    public function test()
    {
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('foo' => 'bar')));
    }

    //minggu 3
    public function ifelse($namachief = null,$namarm = null){
        $tmp = '';
        if($namachief != NULL){
            $tmp = $namachief;
        }
        else if ($namarm != NULL){
           $tmp = $namarm;
        }
        else{
            $tmp = "Something wrong. Please contact US";
        }
        return $tmp;
    }

    public function ifelse2($teman){
        $tmp = '';
        if($teman == "andi"){
            $tmp = "dia adalah teman saya";
        }else{
            $tmp = "dia bukan teman saya";
        }
        return $tmp;
    }

    public function ifelse3($namachief = null, $namarm = null, $namamhs){
        $tmp = '';
        if($namachief != NULL){
            $tmp = $namachief;
        }
        else if ($namarm != NULL){
            $tmp = $namarm;
        }
        else if ($namamhs != NULL){
            $tmp = $namamhs;
         }
        else{
            $tmp = "Something wrong. Please contact US";
        }
        return $tmp;
    }

    public function ifelse4($inputtgl = 'D'){
        $tmp = '';
        $d = date($inputtgl);
        if($d == "Fri"){
            $tmp = "Have a nice weekend!";
        }elseif($d == "Sun"){
            $tmp = "Have a nice weekend!";
        }elseif($d == "Mon"){
            $tmp = "Have a nice Monday!";
        }elseif($d == "Tue"){
            $tmp = "Have a nice Tuesday!";
        }elseif($d == "Wed"){
            $tmp = "Have a nice Wednesday!";
        }elseif($d == "Thu"){
            $tmp = "Have a nice Thursday!";
        }elseif($d == "Sat"){
            $tmp = "Have a nice Weekend!";
        }
        return $tmp;
    }

    public function loop1($var){
        for ($i=0; $i <= 10; $i++) { 
            $var+=$var;
        }
        return $var;
    }

    public function loop2($arr){
        $result = '';
        foreach ($arr as $key => $value) {
            if($key % 2 == 1){
                $value+=$value;
            }
            $result = $value;
        }
        return $result;
    }

    public function loop3($var){
        $a=0;
        while ($a <= 10) {
            $var += $var;
            $a++;
        }
        return $var;
    }
}
