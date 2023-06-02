<?php

  interface KontrakPasienView {
      public function tampil();
      public function onFormAdd($data);
      public function onFormEdit($data);
      public function onFormDelete($id);
  }

  interface KontrakPasienPresenter {
      public function prosesDataPasien();
      public function onFormAdd($data);
      public function onFormEdit($data);
      public function onFormDelete($id);
      public function getId($i);
      public function getNik($i);
      public function getNama($i);
      public function getTempat($i);
      public function getTl($i);
      public function getGender($i);
      public function getSize();
  }
