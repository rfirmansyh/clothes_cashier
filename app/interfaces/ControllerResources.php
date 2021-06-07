<?php
    // builder
    interface ControllerResources {
        public function index();
        public function show($id);
        public function create();
        public function edit($id);
        public function store();
        public function update($id);
        public function delete($id);
    } 