<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Contact extends CI_Controller{
    public function view($id){
        //load the model
        $this->load->model('ContactInfo');
        
        //call load from the model
        $this->ContactInfo->load($id);
        
        //Set data for contact info to be displayed in html
        $data['id'] = $id;
        $data['name'] = $this->ContactInfo->getData('name');
        $data['email'] = $this->ContactInfo->getData('email');
        
        //load display html with data
        $this->load->helper('url');
        $this->load->view('contact_display', $data);
    }
}
