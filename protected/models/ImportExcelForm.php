<?php

class ImportExcelForm extends CFormModel
{
	/**
	 * @return string the associated database table name
	 */
        public $file_excel;
        public $instance_file_excel;
        public $data_file_excel;
        public $jumlah_import;
        
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('file_excel', 'required'),
			array('file_excel', 'file', 'types'=>'xls'),
                        array('file_excel', 'cektemplate')
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function attributeLabels()
	{
		return array(
			'file_excel' => 'File Excel',
		);
	}
        
        public function cektemplate($attribute, $params) {
            if(!$this->hasErrors()):
                $error = FALSE;
                $this->instance_file_excel = CUploadedFile::getInstance($this,'file_excel');
                $path = Yii::app()->basePath.'/../temp/'.$this->instance_file_excel->getName();
                $this->instance_file_excel->saveAs($path);
                $this->data_file_excel = new Spreadsheet_Excel_Reader($path);
                $nama_kolom = array(
                    'kode',
                    'nama',
                    'username',
                    'password',
                    'alamat',
                    'jk',
                    'pendidikan',
                    'jurusan',
                    'umur',
                    'nohp',
                    'ttl',
                    'status_kawin',
                    'pekerjaan',
                    'pengalaman',
                    'shift',
                    'rekomendasi',
                    'level'
                );
                
                for($i=0;$i<count($nama_kolom);$i++) {
                    $nama_kolom_excel = strtolower(str_replace(' ', '', $this->data_file_excel->sheets[0]['cells'][1][$i+1]));
                    if($nama_kolom_excel!=$nama_kolom[$i]) :
                        $this->addError($attribute, 'Kolom '.$this->data_file_excel->sheets[0]['cells'][1][$i+1].' tidak sesuai template.');
                        //unlink(Yii::app()->basePath.'/../temp/'.$this->instance_file_excel->getName());
                        $error = TRUE;
                    endif;
                }
                
                if(!$error) {
                    $this->import_all($attribute);
                }
            endif;
        }
        
        public function import_all($attribute) {
            $error = FALSE;
            //print_r($this->data_file_excel->sheets[0]['numRows']);
            if($this->data_file_excel->sheets[0]['numRows']<2) {
                $error = TRUE;
                $this->addError($attribute, 'Data yang diimport kosong.');
            }
            
            
            for($i=2; $i<=$this->data_file_excel->sheets[0]['numRows']; $i++) {
                $data[$i-2] = new User;
                $data[$i-2]->kode = isset($this->data_file_excel->sheets[0]['cells'][$i][1])?$this->data_file_excel->sheets[0]['cells'][$i][1]:NULL;
                $data[$i-2]->nama = isset($this->data_file_excel->sheets[0]['cells'][$i][2])?$this->data_file_excel->sheets[0]['cells'][$i][2]:NULL;
                $data[$i-2]->username = isset($this->data_file_excel->sheets[0]['cells'][$i][3])?$this->data_file_excel->sheets[0]['cells'][$i][3]:NULL;
                $data[$i-2]->password = isset($this->data_file_excel->sheets[0]['cells'][$i][4])?$this->data_file_excel->sheets[0]['cells'][$i][4]:NULL;
                $data[$i-2]->alamat = isset($this->data_file_excel->sheets[0]['cells'][$i][5])?$this->data_file_excel->sheets[0]['cells'][$i][5]:NULL;
                $data[$i-2]->jk = isset($this->data_file_excel->sheets[0]['cells'][$i][6])?$this->data_file_excel->sheets[0]['cells'][$i][6]:NULL;
                $data[$i-2]->pendidikan = isset($this->data_file_excel->sheets[0]['cells'][$i][7])?$this->data_file_excel->sheets[0]['cells'][$i][7]:NULL;
                $data[$i-2]->jurusan = isset($this->data_file_excel->sheets[0]['cells'][$i][8])?$this->data_file_excel->sheets[0]['cells'][$i][8]:NULL;
                $data[$i-2]->umur = isset($this->data_file_excel->sheets[0]['cells'][$i][9])?$this->data_file_excel->sheets[0]['cells'][$i][9]:NULL;
                $data[$i-2]->nohp = isset($this->data_file_excel->sheets[0]['cells'][$i][10])?$this->data_file_excel->sheets[0]['cells'][$i][10]:NULL;
                $data[$i-2]->ttl = isset($this->data_file_excel->sheets[0]['cells'][$i][11])?$this->data_file_excel->sheets[0]['cells'][$i][11]:NULL;
                $data[$i-2]->status_kawin = isset($this->data_file_excel->sheets[0]['cells'][$i][12])?$this->data_file_excel->sheets[0]['cells'][$i][12]:NULL;
                $data[$i-2]->pekerjaan = isset($this->data_file_excel->sheets[0]['cells'][$i][13])?$this->data_file_excel->sheets[0]['cells'][$i][13]:NULL;
                $data[$i-2]->pengalaman = isset($this->data_file_excel->sheets[0]['cells'][$i][14])?$this->data_file_excel->sheets[0]['cells'][$i][14]:NULL;
                $data[$i-2]->shift = isset($this->data_file_excel->sheets[0]['cells'][$i][15])?$this->data_file_excel->sheets[0]['cells'][$i][15]:NULL;
                $data[$i-2]->rekomendasi = isset($this->data_file_excel->sheets[0]['cells'][$i][16])?$this->data_file_excel->sheets[0]['cells'][$i][16]:NULL;
                $data[$i-2]->level_id = isset($this->data_file_excel->sheets[0]['cells'][$i][17])?$this->data_file_excel->sheets[0]['cells'][$i][17]:NULL;
                
                
                if(!$data[$i-2]->validate()):
                    $error = TRUE;
                    $this->addError($attribute, 'Data nomor '.$i.' salah/tidak sesuai template.');
                    break;
                endif;
            }
            
            if(!$error) {
                foreach($data as $d){
                    //print_r($d);
                    $d->save(false);
                }
                
                $this->jumlah_import = count($data);
            }
            unlink(Yii::app()->basePath.'/../temp/'.$this->instance_file_excel->getName());
        }
}
