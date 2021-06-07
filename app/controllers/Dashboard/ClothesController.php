

<?php

    class ClothesController extends Controller implements ControllerResources {

        public $Clothe;

        public function __construct() 
        {
            $this->Clothe = $this->model('Clothe');
        }

        public function index() 
        {
            $data['title'] = 'Clothes';
            $data['clothes'] = $this->Clothe->where('status', '=', '"1"')->get();

            $this->view('dashboard/clothes/index', $data);
        }

        public function show($id)
        {
            $data['title'] = 'Clothes detail';
            $data['clothe'] = $this->Clothe->where('id', '=', $id)->first();

            $this->view('dashboard/clothes/show', $data);
        }

        public function create()
        {
            $data['title'] = 'Clothes Create';
            $this->view('dashboard/clothes/create', $data);
        }

        public function edit($id)
        {
            $data['title'] = 'Clothes Edit';
            $data['clothe'] = $this->Clothe->where('id', '=', $id)->first();

            $this->view('dashboard/clothes/edit', $data);
        }

        public function store()
        {
            $requests = $_POST;
            $this->Clothe->props = $requests;
            if ( $this->hasRequestFile($_FILES['photo']) ) {
                $temp_photo = Storage::upload($_FILES['photo'], 'public/img/upload/clothes/');
                $this->Clothe->props['photo'] = $temp_photo;
            }
            $this->Clothe->save();

            Flasher::setFlash(
                'Tambah Data',
                'Tambah Data Baju Berhasil',
                'success'
            );
            header("Location: " . BASE_URL.'/admin/dashboard/clothes/');
        }

        public function update($id)
        {
            $requests = $_POST;
            $this->Clothe->props = $this->Clothe->where('id', '=', $id)->first();
            $this->Clothe->props = array_replace((array) $this->Clothe->props, $requests);
            if ( $this->hasRequestFile($_FILES['photo']) ) {
                $temp_photo = Storage::upload($_FILES['photo'], 'public/img/upload/clothes/');
                $this->Clothe->props['photo'] = $temp_photo;
            }
            $this->Clothe->save();

            Flasher::setFlash(
                'Update Data',
                'Update Data Baju Berhasil',
                'success'
            );
            header("Location: " . BASE_URL.'/admin/dashboard/clothes/');
        }

        public function delete($id)
        {
            $this->Clothe->props = (array) $this->Clothe->where('id', '=', $id)->first();
            $this->Clothe->switchstatus(false);

            Flasher::setFlash(
                'Hapus Data',
                'Hapus Data Baju Berhasil',
                'warning'
            );
            header("Location: " . BASE_URL.'/admin/dashboard/clothes/');
        }
    } 